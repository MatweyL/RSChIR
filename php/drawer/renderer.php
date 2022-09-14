<?php

class ShapeRenderer {

    private static $COLOR_COEFFICIENT = 85;
    private int $size_coefficient;

    private static $OPEN_SVG_TAG = "<svg xmlns='http://www.w3.org/2000/svg' version='1.1' width='500' height='300'>";
    private static $CLOSE_SVG_TAG = '</svg>';

    public function __construct ($size_coefficient) {
        $this->size_coefficient = $size_coefficient;
    }

    public function get_svg_shape($shape_parameters) {
        $red = $shape_parameters["color"][0] * ShapeRenderer::$COLOR_COEFFICIENT;
        $green = $shape_parameters["color"][1] * ShapeRenderer::$COLOR_COEFFICIENT;
        $blue = $shape_parameters["color"][2] * ShapeRenderer::$COLOR_COEFFICIENT;
        $rgb = "rgb({$red}, {$green}, {$blue})";
        $size1 = $shape_parameters["size1"] * $this->size_coefficient;
        $size2 = $shape_parameters["size2"] * $this->size_coefficient;
        
        $svg_base = "style='fill: {$rgb}' stroke='#000001' stroke-width='1' />";
        $svg_body = "";
        switch ($shape_parameters["shape"]) {
            case "rectangle":
                $svg_body =  "<rect x='0' y='0' width='{$size1}' height='{$size2}' "; 
                break;
            case "rhomb":
                $half_size2 = round($size2 / 2);
                $half_size1 = round($size1 / 2);
                $svg_body = "<polygon points='0,{$half_size2} {$half_size1},{$size2} {$size1},{$half_size2} {$half_size1},0' ";
                break;
            case "triangle":
                $svg_body = "<polygon points='0,0 0,{$size2} {$size1},{$size2}' ";
                break;
            case "ellipse":
                $svg_body = "<ellipse cx='{$size1}' cy='{$size2}' rx='{$size1}' ry='{$size2}'";
                break;
            default:
                break;
        }
        return ShapeRenderer::$OPEN_SVG_TAG . $svg_body . $svg_base . ShapeRenderer::$CLOSE_SVG_TAG;

    }
}
?>