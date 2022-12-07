<?php
namespace mvc\models;
require_once './vendor/autoload.php';
use mvc\core\Model;
use Faker\Factory;
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;
use Faker\Provider\ru_RU;
class Statistics extends Model {

    public function generate_fixtures() {
        $data2 = array();
        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();
        // for include russian PersonName
        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));
        $faker->addProvider(new \Faker\Provider\ru_RU\Company($faker));
        $faker->addProvider(new \Faker\Provider\ru_RU\Color($faker));

        // generate 50 records
        for ($i = 0; $i < 50; $i++) {
            $data_row2 = new FakePeople(
                $faker->name(),
                $faker->phoneNumber(),
                $faker->company(),
                $faker->userAgent(),
                $faker->numberBetween(21, 35),
                $faker->dayOfWeek(),
                $faker->randomDigit()
            );
            $data2[] = $data_row2;
        }

        $jsonData2 = json_encode($data2);
        //for generated fixture data
        file_put_contents('results.json', $jsonData2);
    }

    public function get_raw_data(): array {
        $input = file_get_contents('results.json');
        return json_decode($input);
    }

    public function get_ages_count($data): array
    {
        $ages_count = array();
        foreach ($data as $row) {
            $age = $row->age;
            if(!isset($ages_count[$age])) {
                $ages_count[$age] = 0;
            }
            $ages_count[$age] += 1;
        }
        return $ages_count;
    }

    public function get_week_days_count($data): array
    {
        $week_days_count = array();
        foreach ($data as $row) {
            $week_day = $row->day_of_week;
            if(!isset($week_days_count[$week_day])) {
                $week_days_count[$week_day] = 0;
            }
            $week_days_count[$week_day] += 1;
        }
        return $week_days_count;
    }

    public function get_labels_and_values($func) {

        $raw_data = $this->get_raw_data();

        //use given func to array
        $count = $this->$func($raw_data);

        $labels = array_keys($count);
        $values = array_values($count);
        return array("labels" => $labels, "values" => $values);
    }

    public function get_only_data($data, $param)
    {
        $answer = array();
        foreach ($data as $row) {
            $century = $row->$param;
            array_push($answer, $century);
        }
        return $answer;
    }

    public function add_watermark($image)
    {
        $image1 = $image;
        $image2 = 'mvc/models/images/watermark.png';
        list($width, $height) = getimagesize($image2);

        $image1 = imagecreatefromstring(file_get_contents($image1));
        $image2 = imagecreatefromstring(file_get_contents($image2));

        imagealphablending($image2, false);
        imagesavealpha($image2, true);
        $alpha = round(127/255*127); // convert to [0-127]

        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {

                // get current color (R, G, B)
                $rgb = imagecolorat($image2, $x, $y);
                $r = ($rgb >> 16) & 0xff;
                $g = ($rgb >> 8) & 0xff;
                $b = $rgb & 0xf;

                // create new color
                $col = imagecolorallocatealpha($image2, $r, $g, $b, $alpha);

                // set pixel with new color
                imagesetpixel($image2, $x, $y, $col);
            }
        }


        imagecopy($image1, $image2, 50, 50, 0, 0, $width, $height);
        imagepng($image1, $image);
    }

    public function draw_plot_bar()
    {
        $__width = 400;
        $__height = 300;
        $graph = new Graph\Graph($__width, $__height, 'auto');
        $graph->SetShadow();
        $graph->title->Set("Ages");
        $graph->title->SetFont(FF_FONT1, FS_BOLD);


        $labels_and_values = $this->get_labels_and_values('get_ages_count');
        $labels = $labels_and_values["labels"];
        $values = $labels_and_values["values"];
        $databary = $values;
        $graph->SetScale('textlin');
        $graph->xaxis->SetTickLabels($labels);
        $graph->title->Set($_GET['property']);
        $graph->title->SetFont(FF_FONT1, FS_BOLD);
        $b1 = new Plot\BarPlot($databary);
        $b1->SetLegend($_GET['property']);
        $graph->Add($b1);
        $graph->Stroke('mvc/models/images/plot_bar.png');
    }

    public function draw_plot_pie()
    {
        $graph = new Graph\PieGraph(400, 300);
        $graph->title->Set("Distribution of days of the week");
        $graph->title->SetFont(FF_FONT1, FS_BOLD);
        $graph->SetBox(true);

        $labels_and_values = $this->get_labels_and_values('get_week_days_count');
        $labels = $labels_and_values["labels"];
        //echo $labels;
        $values = $labels_and_values["values"];
        //echo $values;

        $p1 = new Plot\PiePlot($values);
        $p1->ShowBorder();
        $p1->SetColor('black');
        $p1->SetLabels($labels);

        $graph->Add($p1);
        $graph->Stroke("mvc/models/images/plot_pie.png");
    }

    function draw_plot_scatter()
    {
        // Some data
        $ydata = $this->get_only_data($this->get_raw_data(),"number");

        // Create the graph. These two calls are always required
        $__width = 1400;
        $__height = 300;
        $graph = new Graph\Graph($__width, $__height, 'auto');
        $graph->SetScale("textlin");

        // Create the linear plot
        $lineplot = new \Amenadiel\JpGraph\Plot\LinePlot($ydata);
        $lineplot->SetColor("blue");

        // Add the plot to the graph
        $graph->Add($lineplot);

        // Display the graph
        $graph->Stroke('mvc/models/images/line_plot.png');

    }

    function drawImages() {
        $this->generate_fixtures();
        $this->draw_plot_bar();
        $this->draw_plot_scatter();
        $this->draw_plot_pie();

        $images = array("mvc/models/images/plot_pie.png", "mvc/models/images/plot_bar.png", "mvc/models/images/line_plot.png");

        foreach ($images as $image) {
            $this->add_watermark($image);
        }
        $data = $this->get_raw_data();
        return array($images, $data);
    }

}