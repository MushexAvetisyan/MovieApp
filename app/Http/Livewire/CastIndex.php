<?php

namespace App\Http\Livewire;

use App\Models\Cast;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class CastIndex extends Component
{
    use WithPagination;

    public $castTMDBId;
    public $castName;
    public $castPosterPath;


    public function generateCast()
    {
       $newCast = Http::get('https://api.themoviedb.org/3/person/'. $this->castTMDBId .'?api_key=601298c356a67798a77090dae86d6a1c&language=en-US
       ')->json();

       $cast = Cast::where('tmdb_id', $newCast['id'])->first();
       if (!$cast){
           Cast::create([
               'tmdb_id' => $newCast['id'],
               'name' => $newCast['name'],
               'slug' => Str::slug($newCast['name']),
               'poster_path' => $newCast['profile_path'] ?? 'Profile picture coming soon',
           ]);
           $this->reset();
           $this->tags = Cast::all();
           $this->dispatchBrowserEvent('banner-message',
               ['style' => 'success', 'message' => 'Cast Created successfully']);
       } else {
           $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Cast Exist']);
       }
    }

    public function render()
    {
        return view('livewire.cast-index', [
            'casts' => Cast::paginate(5)
        ]);
    }
}
