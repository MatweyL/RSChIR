<?php
class ShapeRenderer {
    private $SHAPES_ALLIACES = array(
                                    0b00=>"rectangle",
                                    0b01=>"square",
                                    0b10=>"triangle"
                                    0b11=>"circle"
                                );
    private $SHAPE_SHIFT = 14;
    private $SHAPE_MASK = 0b1100000000000000;

    private $RED_COLOR_SHIFT = 12;
    private $RED_COLOR_MASK = 0b0011000000000000;

    private $GREEN_COLOR_SHIFT = 10;
    private $GREEN_COLOR_MASK = 0b0000110000000000;

    private $BLUE_COLOR_SHIFT = 8;
    private $BLUE_COLOR_MASK = 0b0000001100000000;

    private $WIDTH_SHIFT = 4;
    private $WIDTH_MASK = 0b0000000011110000;

    private $HEIGHT_SHIFT = 0;
    private $WIDTH_MASK = 0b00000000000000001111;

}
function render_svg_shape() {

}