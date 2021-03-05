<?php 

namespace App\Entity;

use App\Entity\Triangle;

class Drawable extends Triangle{

    /**
     * Level
     * @var integer 
     */
    protected $level;

    /**
     * Primary Color
     * @var integer 
     */
    protected $primaryColor;

    /**
     * Primary Color
     * @var integer 
     */
    protected $secondaryColor;

    /**
     * Image
     * @var image 
     */
    protected $image;

    /**
     * Points
     * @var array 
     */
    protected $points;

    public function __construct(int $level=4,array $primaryColor=array( 0, 0, 255),array $secondaryColor=array( 0, 0, 0)){

        parent::__construct();

        if(count($primaryColor)!=3 || count($secondaryColor)!=3)
            throw new \Exception('Array lenght must be 3.');
        
        $this->level = $level;
        $this->primaryColor = array( 0, 0, 255);
        $this->secondaryColor = array( 0, 0, 0);
    }

    public function draw(){

        ini_set('xdebug.max_nesting_level', 900);
        $this->drawMainTriangle();
        if($this->level>=1)
            $position=$this->drawSecondTriangle($this->level,$this->getEdge2(),$this->getEdge3(),$this->getX(),$this->getY());
        if($this->level>1)
            $this->drawAll($position,$this->level);

        header('Content-type: image/png');
        imagepng($this->image);
        imagedestroy($this->image);

    }

    public function drawMainTriangle(){
        $mainTriangle = array(
            $this->getX(), $this->getY(),				// start
            $this->getX()+$this->getEdge3(), $this->getY(),				// base
            $this->getX()+$this->getWidth(), $this->getY()-$this->getHeight() 	// apex
            );
        $this->image = imagecreatetruecolor($this->getImageHeight(), $this->getImageWidth());
        $primaryColor = imagecolorallocate($this->image, ...$this->primaryColor);
        imagefilledpolygon($this->image, $mainTriangle, 3, $primaryColor);
    }

    public function drawSecondTriangle($level,$b,$c,$x,$y){
        $b=$b/2;
        $c=$c/2;
        $height = abs(sin($this->getAlpha())) * $b;
        $width = abs(cos($this->getAlpha())) * $b;
        $x=$x+$c/2;
        $y=$y-$height;
        $points = array(
            $x, $y,				// start
            $x+$c, $y,				// base
            $x+$width, $y+$height 	// apex
        );
        $secondaryColor = imagecolorallocate($this->image, ...$this->secondaryColor);
        imagefilledpolygon($this->image, $points, 3, $secondaryColor);
        
        return[$b,$c,$x,$y];
    }

    public function drawAll($elems,$level){

        if($level<=1)
        return;
        $level=$level-1;
        $this->drawAll($this->centerizeUp($elems),$level);
        $this->drawAll($this->centerizeLeft($elems),$level);
        $this->drawAll($this->centerizeRight($elems),$level);
    }

    public function centerizeUp($elems){
        $b=$elems[0]/2;
        $height = $this->calcHeight($b,$this->getAlpha());
        $width = $this->calcWidth($b,$this->getAlpha());
        $x=$elems[2]+$elems[1]/4;
        $y=$elems[3]-$height;
        $points = array(
            $x, $y,				// start
            $x+$elems[1]/2, $y,				// base
            $x+$width, $y+$height 	// apex
            );
        //return $points;
        $black = imagecolorallocate($this->image, ...$this->secondaryColor);
        imagefilledpolygon($this->image, $points, 3, $black);
        return [$b,$elems[1]/2,$x,$y];
    }

    public function centerizeLeft($elems){
        $b=$elems[0]/2;
        $height = $this->calcHeight($b,$this->getAlpha());
        $width = $this->calcWidth($b,$this->getAlpha());
        $x=$elems[2]-$elems[1]/4;
        $y=$elems[3]+$height;
        $points = array(
            $x, $y,				// start
            $x+$elems[1]/2, $y,				// base
            $x+$width, $y+$height 	// apex
            );
            //return $points;
            $black = imagecolorallocate($this->image, ...$this->secondaryColor);
            imagefilledpolygon($this->image, $points, 3, $black);
            return [$b,$elems[1]/2,$x,$y];
    }

    public function centerizeRight($elems){
        $b=$elems[0]/2;
        $height = $this->calcHeight($b,$this->getAlpha());
        $width = $this->calcWidth($b,$this->getAlpha());
        $x=$elems[2]+(($elems[1]/4)*3);
        $y=$elems[3]+$height;
        $points = array(
            $x, $y,				// start
            $x+$elems[1]/2, $y,				// base
            $x+$width, $y+$height 	// apex
            );
            //return $points;
            $black = imagecolorallocate($this->image, ...$this->secondaryColor);
            imagefilledpolygon($this->image, $points, 3, $black);
            return [$b,$elems[1]/2,$x,$y];
    }


    public function getHeight(){
        return $this->calcHeight($this->getEdge2(),$this->getAlpha());
    }

    public function getWidth(){
        return $this->calcWidth($this->getEdge2(),$this->getAlpha());
    }

    public function calcHeight($edge,$alpha){

        return abs(sin($alpha)) * $edge;
    }
    
    public function calcWidth($edge,$alpha){

       return abs(cos($alpha)) * $edge;
    }

}