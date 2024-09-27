<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Group;
use App\Models\Image;
use App\Models\level as ModelsLevel;
use App\Models\Level as AppModelsLevel;
use App\Models\Location;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Carbon\Factory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Monolog\Level;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        // User::factory(10)->create();
        //factory(App\Group::class , 3)->create();
        

        Group::factory(3)->create([
            
        ]);
        AppModelsLevel::factory()->create([
            'name'=>'oro'
            
        ]);
          AppModelsLevel::factory()->create([
            'name'=>'plata'
            
        ]);
          AppModelsLevel::factory()->create([
            'name'=>'bronce'
            
        ]);
        User::factory(5)->create()->each(function($user){
            $profile = $user->profile()->save(Profile::factory()->make());
            $profile -> location()->save(Location::factory()->make());
            $user->groups()->attach($this->array(rand(1,3)));
            $user->image()->save(Image::factory()->make(['url'=>'https://lorempixel.com/90/90']));
        });
        Category::factory(4)->create([
            
        ]);
        Tag::factory(12)->create([
            
        ]);
        Post::factory(40)->create()->each(function($post){
            $post->image()->save(Image::factory()->make());
            $post->comments()->save(Comment::factory()->make());
            
            $number_comments=rand(1,6);
            for ($i=0; $i <$number_comments ; $i++) { 
                $post->comments()->save(Comment::factory()->make());
            }
        });
        Video::factory(40)->create()->each(function($video){
            $video->image()->save(Image::factory()->make());
            $video->comments()->save(Comment::factory()->make());
            
            $number_comments=rand(1,6);
            for ($i=0; $i <$number_comments ; $i++) { 
                $video->comments()->save(Comment::factory()->make());
            }
        });

        
            

         
        // ([
        /*    'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

    }
    public function array($max){
        $values=[];
        for ($i=1; $i <$max ; $i++) { 
            $values[]=$i;
        }
        return $values; 
    }
}
