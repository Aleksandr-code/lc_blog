<?php

namespace App\Http\Controllers\Admin\Post;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
        // безвозвратное удаление изображение (неподходит для softdelete)
        Storage::disk('public')->delete($post->preview_image);
        Storage::disk('public')->delete($post->main_image);

        // полностью отсоедияем теги (неподходит для softdelete)
        // в случае с softdelete, лучше добавить метод удаления (soft-delete для модели) в модель PostTags и вызвать его здесь
        $post->tags()->detach();

        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
