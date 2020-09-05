<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Livelesson extends JsonResource
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
            'name' => $this->name,
            'topic' => $this->topic,
            'slug' => $this->slug,
            'live_url' => $this->live_url,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'password' => $this->password,
            'unpublish' => $this->unpublish,
            'school_id' => $this->school_id,
            'session' => $this->session,
            'class_id' => $this->class_id,
            'section_id' => $this->section_id,
            'subject_id' => $this->subject_id,
            'user_id' => $this->user_id,
        ];
    }
}
