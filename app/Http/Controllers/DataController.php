<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\giangvien;
use App\sinhvien;
use App\khoa;
use App\lop;
use App\detai;
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
            ['email' => 'tranvanminh@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'vocongthanh@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'lethithanhhang@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'doquanghieu@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            ['email' => 'longthilanh@gmail.com','level'=>2,'password'=> bcrypt('hung0403')],
            
            ['email' => 'trinhthikimngan@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenngochien@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenngocquynh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'phamvanmanh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyentrongnghia@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'hoangthienphu@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyencaohalinh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'trantrunghieu@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
            ['email' => 'nguyenphuongquynh@gmail.com','level'=>3,'password'=> bcrypt('hung0403')],
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
        giangvien::insert([
            ['ho' => 'Nguyễn Văn','ten'=>'Hoàn','idusers'=>2,'idkhoa'=>1,'hocvi'=>'Thạc sĩ'],
            ['ho' => 'Trần Văn','ten'=>'Minh','idusers'=>3,'idkhoa'=>1,'hocvi'=>'Tiến sĩ'],
            ['ho' => 'Võ Công','ten'=>'Thành','idusers'=>4,'idkhoa'=>2,'hocvi'=>'Thạc sĩ'],
            ['ho' => 'Lê Thị Thanh','ten'=>'Hằng','idusers'=>5,'idkhoa'=>2,'hocvi'=>'Thạc sĩ'],
            ['ho' => 'Đỗ Quang','ten'=>'Hiếu','idusers'=>6,'idkhoa'=>2,'hocvi'=>'Tiến sĩ'],
            ['ho' => 'Long Thị','ten'=>'Lanh','idusers'=>7,'idkhoa'=>1,'hocvi'=>'Tiến sĩ']
        ]);
        sinhvien::insert([
            ['ho' => 'Trịnh Thị Kim','ten'=>'Ngân','gvhd'=>'Nguyễn Văn Hoàn','idusers'=>8,'idlop'=>1],
            ['ho' => 'Nguyễn Ngọc','ten'=>'Hiền','gvhd'=>'Trần Văn Minh','idusers'=>9,'idlop'=>1],
            ['ho' => 'Nguyễn Ngọc','ten'=>'Quỳnh','gvhd'=>'Nguyễn Văn Hoàn','idusers'=>10,'idlop'=>2],
            ['ho' => 'Phạm Văn','ten'=>'Mạnh','gvhd'=>'Võ Công Thành','idusers'=>11,'idlop'=>2],
            ['ho' => 'Nguyễn Trọng','ten'=>'Nghĩa','gvhd'=>'Lê Thị Thanh Hằng','idusers'=>12,'idlop'=>3],
            ['ho' => 'Hoàng Thiên','ten'=>'Phú','gvhd'=>'Trần Văn Minh','idusers'=>13,'idlop'=>4],
            ['ho' => 'Nguyễn Cao Hà','ten'=>'Linh','gvhd'=>'Long Thị Lanh','idusers'=>14,'idlop'=>5],
            ['ho' => 'Trần Trung','ten'=>'Hiếu','gvhd'=>'Đỗ Quang Hiếu','idusers'=>15,'idlop'=>5],
            ['ho' => 'Nguyễn Phương','ten'=>'Quỳnh','gvhd'=>'Nguyễn Văn Hoàn','idusers'=>16,'idlop'=>3],
            ['ho' => 'Lung Thị','ten'=>'Linh','gvhd'=>'Võ Công Thành','idusers'=>17,'idlop'=>6]
        ]);
        detai::insert([
            ['tendetai' => 'Nghiên cứu các giải pháp bảo đảm an ninh, an toàn thông tin cho các cổng thông tin điện tử ',
            'mota'=>'Nghiên cứu các giải pháp bảo đảm an ninh, an toàn thông tin cho các cổng thông tin điện tử ',
            'tiendo'=>'0','thamkhao'=> 0,'daduyet'=>1,'idsinhvien'=> 10],
            ['tendetai' => 'Nghiên cứu bảo đảm an toàn thông tin bằng kiểm soát truy nhập ',
            'mota'=>'Nghiên cứu bảo đảm an toàn thông tin bằng kiểm soát truy nhập',
            'tiendo'=>'10','thamkhao'=> 0,'daduyet'=>1,'idsinhvien'=> 9],
            ['tendetai' => 'Xây dựng ứng dụng video conference sử dụng Kurento Media Server',
            'mota'=>'Xây dựng ứng dụng video conference sử dụng Kurento Media Server',
            'tiendo'=>'5','thamkhao'=> 1,'daduyet'=>0,'idsinhvien'=> 8],
            ['tendetai' => 'Xây dựng hệ thống kết nối doanh nghiệp với sinh viên',
            'mota'=>'Xây dựng hệ thống kết nối doanh nghiệp với sinh viên',
            'tiendo'=>'20','thamkhao'=> 1,'daduyet'=>0,'idsinhvien'=> 7],
            ['tendetai' => 'Nghiên cứu lập trình WPF trong xây dựng ứng dụng học tiếng Anh cho trẻ em',
            'mota'=>'Nghiên cứu lập trình WPF trong xây dựng ứng dụng học tiếng Anh cho trẻ em',
            'tiendo'=>'80','thamkhao'=> 0,'daduyet'=>0,'idsinhvien'=> 6],
            ['tendetai' => 'Hệ thống gợi ý tour du lịch tối ưu theo ràng buộc của người dùng',
            'mota'=>'Hệ thống gợi ý tour du lịch tối ưu theo ràng buộc của người dùng',
            'tiendo'=>'25','thamkhao'=> 0,'daduyet'=>0,'idsinhvien'=> 5],
            ['tendetai' => 'Tìm hiểu hệ mã nguồn mở Laravel và ứng dụng xây dựng Website thương mại điện tử',
            'mota'=>'Tìm hiểu hệ mã nguồn mở Laravel và ứng dụng xây dựng Website thương mại điện tử',
            'tiendo'=>'40','thamkhao'=> 1,'daduyet'=>1,'idsinhvien'=> 4],
            ['tendetai' => 'Xây dựng ứng dụng di động cho chợ nông sản Khánh Hoà trực tuyến',
            'mota'=>'Xây dựng ứng dụng di động cho chợ nông sản Khánh Hoà trực tuyến',
            'tiendo'=>'100','thamkhao'=> 1,'daduyet'=>1,'idsinhvien'=> 3],
            ['tendetai' => 'Nghiên cứu công nghệ Web và xây dựng hệ thống tra cứu tour du lịch tại Nha Trang, Khánh Hòa',
            'mota'=>'Nghiên cứu công nghệ Web và xây dựng hệ thống tra cứu tour du lịch tại Nha Trang, Khánh Hòa',
            'tiendo'=>'85','thamkhao'=> 0,'daduyet'=>0,'idsinhvien'=> 2],
            ['tendetai' => 'Lập trình IoT điều khiển thiết bị trong nhà sử dụng Rapberry',
            'mota'=>'Lập trình IoT điều khiển thiết bị trong nhà sử dụng Rapberry',
            'tiendo'=>'55','thamkhao'=> 0,'daduyet'=>1,'idsinhvien'=> 1]
        ]);
    }
}
