<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Str;

class TagIndex extends Component
{
    public $showTagModal = false;
    public $tagName;
    public $tagId;
    public $tags = [];

    protected $rules = [
        'tagName' => 'required',
    ];


    /**
     * @return void
     */
    public function showCreateModal()
    {
        $this->showTagModal = true;
    }


    /**
     * @return void
     */
    public function closeTagModal()
    {
        $this->showTagModal = false;
    }


    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.tag-index');
    }


    /**
     * @return void
     */
    public function createTag()
    {
        Tag::create([
           'tag_name' => $this->tagName,
            'slug'    => Str::slug($this->tagName)
        ]);
        $this->reset();
        $this->tags = Tag::all();
        $this->showTagModal = false;
        $this->dispatchBrowserEvent('banner-message',
        ['style' => 'success', 'message' => 'Tag Created successfully']);
    }


    /**
     * @param $tagId
     * @return void
     */
    public function showEditModal($tagId)
    {
        $this->reset(['tagName']);
        $this->tagId = $tagId;
        $tag = Tag::find($tagId);
        $this->tagName = $tag->tag_name;
        $this->showTagModal = true;
    }


    /**
     * @return void
     */
    public function updateTag()
    {
        $this->validate();
        $tag = Tag::findOrFail($this->tagId);
        $tag->update([
           'tag_name' => $this->tagName,
           'slug' => Str::slug($this->tagName)
        ]);
        $this->reset();
        $this->tags = Tag::all();
        $this->showTagModal = false;
        $this->dispatchBrowserEvent('banner-message',
            ['style' => 'success', 'message' => 'Tag Updated successfully']);
    }


    /**
     * @param $tagId
     * @return void
     */
    public function deleteTag($tagId)
    {
        $tag = Tag::findOrFail($tagId);
        $tag->delete();
        $this->reset();
        $this->tags = Tag::all();
        $this->showTagModal = false;
        $this->dispatchBrowserEvent('banner-message',
            ['style' => 'danger', 'message' => 'Tag Deleted successfully']);
    }

    /**
     * @return void
     */
    public function mount()
    {
        $this->tags = Tag::all();
    }
}
