<?php


date_default_timezone_set('America/Los_Angeles');



require __DIR__ . '/../vendor/autoload.php';

$f = new Rox\Foreup_api();
var_dump($f->func());


var_dump($f->authenticate('devtesting','devtesting1'));

var_dump($f->isValidUser());


$data = new \stdClass();

$data->username                                      = "username";
$data->company_name                                  = "MyCOmpany";
$data->taxable                                       = true;
$data->discount                                      = 0;
$data->opt_out_email                                 = false;
$data->opt_out_text                                  = false;
    $data->contact_info->id                          = "2073";
    $data->contact_info->first_name                  = "FirstName";
    $data->contact_info->last_name                   = "LastName";
    $data->contact_info->phone_number                = "801";
    $data->contact_info->cell_phone_number           = "123 123 123";
    $data->contact_info->email                       = "fakeemail@fake.com";
    $data->contact_info->birthday                    = "2017-01-09T06:07:00-0700";
    $data->contact_info->address_1                   = "3321 test address";
    $data->contact_info->address_2                   = "";
    $data->contact_info->city                        = "True City";
    $data->contact_info->state                       = "CA";
    $data->contact_info->zip                         = "95691";
    $data->contact_info->country                     = "USA";
    $data->contact_info->handicap_account_number     = "123";
    $data->contact_info->handicap_score              = "12";
    $data->contact_info->comments                    = "Best customer ever!!!";

$f->CreateCustomer('9039', $data);
