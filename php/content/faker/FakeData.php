<?php

class FakeData
{
    public string $name;
    public string $color;
    public string $date;
    public string $time;
    public string $month;
    public string $century;
    public string $countryCode;
    public string $number;
    public string $latitude;
    public string $longitude;

    public function __construct(string $name,
                                string $color,
                                string $date,
                                string $time,
                                string $month,
                                string $century,
                                string $countryCode,
                                string $number,
                                string $latitude,
                                string $longitude
    )
    {
        $this->name = $name;
        $this->color = $color;
        $this->date = $date;
        $this->time = $time;
        $this->month = $month;
        $this->century = $century;
        $this->countryCode = $countryCode;
        $this->number = $number;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }


}

class FakePeople
{
    public string $name;
    public string $phone_number;
    public string $company;
    public string $user_agent;
    public string $age;
    public string $day_of_week;
    public string $number;

    public function __construct(string $name,
                                string $phone_number,
                                string $company,
                                string $user_agent,
                                string $age,
                                string $day_of_week,
                                string $number
    )
    {
        $this->name = $name;
        $this->phone_number = $phone_number;
        $this->company = $company;
        $this->user_agent = $user_agent;
        $this->age = $age;
        $this->day_of_week = $day_of_week;
        $this->number = $number;
    }


}