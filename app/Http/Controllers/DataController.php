<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\giangvien;
use App\sinhvien;
use App\khoa;
use App\lop;
use app\detai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Session;

class DataController extends Controller
{
    public function defaultdata(){
        user::insert([ 
            ['email' => 'daoleduyhung@gmail.com','level'=>1,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenvanhoan@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'lungthilinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')]
        ]);
        khoa::insert([
            ['tenkhoa' => 'CNTT'],
            ['tenkhoa' => 'ĐTVT']
        ]);
        lop::insert([
            ['tenlop' => 'ĐHCN3A','idkhoa'=>1],
            ['tenlop' => 'ĐHCN3B','idkhoa'=>1],
            ['tenlop' => 'ĐHCN3C','idkhoa'=>1],
            ['tenlop' => 'ĐHVT3A','idkhoa'=>2],
            ['tenlop' => 'ĐHVT3B','idkhoa'=>2],
            ['tenlop' => 'ĐHVT3C','idkhoa'=>2]
        ]);
    }
}
