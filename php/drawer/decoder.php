<?php
class ShapeParametersDecoder {
    private static $SHAPES_ALLIACES = array(
                                    0b00=>"rectangle",
                                    0b01=>"rhomb",
                                    0b10=>"triangle",
                                    0b11=>"ellipse"
                                );
    private static $SHAPE_SHIFT = 14;
    private static $SHAPE_MASK = 0b1100000000000000;

    private static $RED_COLOR_SHIFT = 12;
    private static $RED_COLOR_MASK = 0b0011000000000000;

    private static $GREEN_COLOR_SHIFT = 10;
    private static $GREEN_COLOR_MASK = 0b0000110000000000;

    private static $BLUE_COLOR_SHIFT = 8;
    private static $BLUE_COLOR_MASK = 0b0000001100000000;

    private static $SIZE_VALUE_1 = 4; // it can be len of diagonal/side/r of ellipse radius
    private static $SIZE_MASK_1 = 0b0000000011110000;

    private static $SIZE_VALUE_2 = 0;
    private static $SIZE_MASK_2 = 0b00000000000000001111;

    private static function get_value_from_number(int $number, int $mask, int $shift) {
        return ($number & $mask) >> $shift;
    }

    public function decode_parameters(int $number) {
        $shapeKey = ShapeParametersDecoder::get_value_from_number($number, ShapeParametersDecoder::$SHAPE_MASK, ShapeParametersDecoder::$SHAPE_SHIFT);
        $redColorNumber = 85 * ShapeParametersDecoder::get_value_from_number($number, ShapeParametersDecoder::$RED_COLOR_MASK, ShapeParametersDecoder::$RED_COLOR_SHIFT);
        $greenColorNumber = 85 * ShapeParametersDecoder::get_value_from_number($number, ShapeParametersDecoder::$GREEN_COLOR_MASK, ShapeParametersDecoder::$GREEN_COLOR_SHIFT);
        $blueColorNumber = 85 * ShapeParametersDecoder::get_value_from_number($number, ShapeParametersDecoder::$BLUE_COLOR_MASK, ShapeParametersDecoder::$BLUE_COLOR_SHIFT);
        $size1 = ShapeParametersDecoder::get_value_from_number($number, ShapeParametersDecoder::$SIZE_MASK_1, ShapeParametersDecoder::$SIZE_VALUE_1);
        $size2 = ShapeParametersDecoder::get_value_from_number($number, ShapeParametersDecoder::$SIZE_MASK_2, ShapeParametersDecoder::$SIZE_VALUE_2);
        return ["shape"=>ShapeParametersDecoder::$SHAPES_ALLIACES[$shapeKey], 
                "color"=>[$redColorNumber, $greenColorNumber, $blueColorNumber], 
                "size1"=>$size1,
                "size2"=>$size2
                ];
    }

}

?>