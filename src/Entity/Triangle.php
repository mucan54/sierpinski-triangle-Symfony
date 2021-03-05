<?php

namespace App\Entity;


class Triangle
{

    /**
     * Edge 1 to create triangle
     * @var integer 
     */
    protected $edge1;

    /**
     * Edge 2 to create triangle
     * @var integer 
     */
    protected $edge2;

    /**
     * Edge 3 to create triangle
     * @var integer 
     */
    protected $edge3;

    /**
     * Start point X
     * @var integer 
     */
    protected $x;

    /**
     * Start point Y
     * @var integer 
     */
    protected $y;

    /**
     * Image width
     * @var integer 
     */
    protected $imageWidth;

    /**
     * Image Height
     * @var integer 
     */
    protected $imageHeight;

    /**
     * Alpha angel
     * @var float 
     */
    protected $alpha;

    /**
     * Level
     * @var int 
     */
    protected $level;


    public function __construct(){
        $this->edge1 = 600;
        $this->edge2 = 600;
        $this->edge3 = 600;
        $this->x = 20;
        $this->y = 580;
        $this->imageWidth = 650;
        $this->imageHeight = 650;
        $this->alpha = acos((pow($this->edge2,2) + pow($this->edge3,2) - pow($this->edge1,2)) / (2 * $this->edge2 * $this->edge3));
    }

    public function setTriange(array $triangle){

        if(count($triangle)!=3){
            throw new \Exception('Array lenght must be 3.');
        }

        sort($triangle);

        $this->edge3 = $triangle[2]; // base
        $this->edge2 = $triangle[1]; // sides
        $this->edge1 = $triangle[0];

        // calculate angle, cosine rule
        // https://en.wikipedia.org/wiki/Law_of_cosines
        $this->alpha = acos((pow($this->edge2,2) + pow($this->edge3,2) - pow($this->edge1,2)) / (2 * $this->edge2 * $this->edge3));
    }

    public function getimageWidth(){
		return $this->imageWidth;
	}

	public function setimageWidth($imageWidth){
		$this->imageWidth = $imageWidth;
	}

	public function getimageHeight(){
		return $this->imageHeight;
	}

	public function setimageHeight($imageHeight){
		$this->imageHeight = $imageHeight;
    }
    
    public function getX(){
		return $this->x;
	}

	public function setX($x){
		$this->x = $x;
	}

	public function getY(){
		return $this->y;
	}

	public function setY($y){
		$this->y = $y;
    }
    
    public function getEdge1(){
		return $this->edge1;
	}

	public function getEdge2(){
		return $this->edge2;
	}

	public function getEdge3(){
		return $this->edge3;
	}

    public function getAlpha(){
		return $this->alpha;
	}
}