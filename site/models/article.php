<?php

class ArticlePage extends Page {
    public function url($options = null): string {

      // Add date to the returned URL. Note that this is simplified as 
      // it is save to assume that the parent (blog) page exists.

      return $this->url = $this->parent()->url() . '/' . $this->published()->toDate('Y'). '/'  . $this->published()->toDate('m'). '/' . $this->uid();
  }
}