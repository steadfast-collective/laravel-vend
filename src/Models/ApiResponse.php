<?php

namespace SteadfastCollective\LaravelVend\Models;

use Illuminate\Support\Str;

class ApiResponse
{
    private $headers;

    private $body;

    public function setHeaders($headers)
    {
        $this->headers = $headers;

        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function hasMorePages()
    {
        if ($this->headers === null) {
            return false;
        }

        if (!is_array($this->headers)) {
            return false;
        }

        return array_key_exists('Link', $this->headers) && Str::contains($this->headers['Link'][0], "rel=\"next\"");
    }

    // /**
	//  * Dynamically retrieve attributes on the model.
	//  *
	//  * @param  string  $key
	//  * @return mixed
	//  */
	// public function __get($key)
	// {
    //     if (array_key_exists($key, $this->body))
	// 	{
	// 		return $this->body[$key];
	// 	}
    //
    //     return null;
	// }

}
