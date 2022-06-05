<?php

namespace App\Http\Livewire;


use App\Models\Genre;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class GenreIndex extends Component
{
    use WithPagination;

    public $tmdbId;
    public $title;
    public $genreId;

    public $showGenreModal = false;

    protected $rules = [
        'title' => 'required',
    ];


    /**
     * @return void
     */
    public function generateGenre()
    {
        $newGenre = Http::get('https://api.themoviedb.org/3/genre/'. $this->tmdbId .'?api_key=601298c356a67798a77090dae86d6a1c&language=en-US
       ')->json();

        $genre = Genre::where('tmdb_id', $newGenre['id'])->first();
        if (!$genre){
            Genre::create([
                'tmdb_id' => $newGenre['id'],
                'title' => $newGenre['name'],
                'slug' => Str::slug($newGenre['name']),
            ]);
            $this->reset();
            $this->tags = Genre::all();
            $this->dispatchBrowserEvent('banner-message',
                ['style' => 'success', 'message' => 'Genre Created successfully']);
        } else {
            $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Genre Exist Exist']);
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function showEditModal($id)
    {
        $this->genreId = $id;
        $this->loadGenre();
        $this->showGenreModal = true;
    }

    /**
     * @return void
     */
    public function loadGenre()
    {
        $genre = Genre::findOrFail($this->genreId);
        $this->title = $genre->title;
    }


    /**
     * @return void
     */
    public function updateGenre()
    {
        $this->validate();
        $genre = Genre::findOrFail($this->genreId);
        $genre->update([
            'name' => $this->title,
        ]);
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Genre Updated']);
        $this->reset();
    }


    public function deleteGenre($id)
    {
        Genre::findOrFail($id)->delete();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Genre Deleted']);
        $this->reset();
    }

    /**
     * @return void
     */
    public function closeGenreModal()
    {
        $this->reset();
        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.genre-index', [
            'genres' => Genre::paginate(5)
        ]);
    }
}
