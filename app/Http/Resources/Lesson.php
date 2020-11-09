<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Lesson extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

                'id' => $this->id,
                'classes_id' => $this->classes_id,
                'section_id' => $this->section_id,
                'title' => $this->title,
                'slug' => $this->slug,
                'lesson_image' => $this->lesson_image,
                'downloadable_files' => $this->downloadable_files,
                'short_text' => $this->short_text,
                'full_text' => $this->full_text,
                'position' => $this->position,
                'free_lesson' => $this->free_lesson,
                'published' => $this->published,
                'school_id' => $this->school_id,
                'session' => $this->session,
                //'title' => $this->title,
            ];
    }
}
