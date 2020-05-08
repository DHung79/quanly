<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\giangvien;
use App\sinhvien;
use App\khoa;
use App\lop;
use App\detai;
use App\sukien;
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
            'tomtat'=>'Nghiên cứu các giải pháp bảo đảm an ninh, an toàn thông tin cho các cổng thông tin điện tử ',
            'tiendo'=>'0','thamkhao'=> 0,'daduyet'=>1,'idsinhvien'=> 10,'idgvhd'=> 3],
            ['tendetai' => 'Nghiên cứu bảo đảm an toàn thông tin bằng kiểm soát truy nhập ',
            'tomtat'=>'Nghiên cứu bảo đảm an toàn thông tin bằng kiểm soát truy nhập',
            'tiendo'=>'10','thamkhao'=> 0,'daduyet'=>1,'idsinhvien'=> 9,'idgvhd'=> 1],
            ['tendetai' => 'Xây dựng ứng dụng video conference sử dụng Kurento Media Server',
            'tomtat'=>'Xây dựng ứng dụng video conference sử dụng Kurento Media Server',
            'tiendo'=>'5','thamkhao'=> 1,'daduyet'=>0,'idsinhvien'=> 8,'idgvhd'=> 5],
            ['tendetai' => 'Xây dựng hệ thống kết nối doanh nghiệp với sinh viên',
            'tomtat'=>'Xây dựng hệ thống kết nối doanh nghiệp với sinh viên',
            'tiendo'=>'20','thamkhao'=> 1,'daduyet'=>0,'idsinhvien'=> 7,'idgvhd'=> 6],
            ['tendetai' => 'Nghiên cứu lập trình WPF trong xây dựng ứng dụng học tiếng Anh cho trẻ em',
            'tomtat'=>'Nghiên cứu lập trình WPF trong xây dựng ứng dụng học tiếng Anh cho trẻ em',
            'tiendo'=>'80','thamkhao'=> 0,'daduyet'=>0,'idsinhvien'=> 6,'idgvhd'=> 2],
            ['tendetai' => 'Hệ thống gợi ý tour du lịch tối ưu theo ràng buộc của người dùng',
            'tomtat'=>'Hệ thống gợi ý tour du lịch tối ưu theo ràng buộc của người dùng',
            'tiendo'=>'25','thamkhao'=> 0,'daduyet'=>0,'idsinhvien'=> 5,'idgvhd'=> 4],
            ['tendetai' => 'Tìm hiểu hệ mã nguồn mở Laravel và ứng dụng xây dựng Website thương mại điện tử',
            'tomtat'=>'Tìm hiểu hệ mã nguồn mở Laravel và ứng dụng xây dựng Website thương mại điện tử',
            'tiendo'=>'40','thamkhao'=> 1,'daduyet'=>1,'idsinhvien'=> 4,'idgvhd'=> 3],
            ['tendetai' => 'Xây dựng ứng dụng di động cho chợ nông sản Khánh Hoà trực tuyến',
            'tomtat'=>'Xây dựng ứng dụng di động cho chợ nông sản Khánh Hoà trực tuyến',
            'tiendo'=>'100','thamkhao'=> 1,'daduyet'=>1,'idsinhvien'=> 3,'idgvhd'=> 1],
            ['tendetai' => 'Nghiên cứu công nghệ Web và xây dựng hệ thống tra cứu tour du lịch tại Nha Trang, Khánh Hòa',
            'tomtat'=>'Nghiên cứu công nghệ Web và xây dựng hệ thống tra cứu tour du lịch tại Nha Trang, Khánh Hòa',
            'tiendo'=>'85','thamkhao'=> 0,'daduyet'=>0,'idsinhvien'=> 2,'idgvhd'=> 2],
            ['tendetai' => 'Lập trình IoT điều khiển thiết bị trong nhà sử dụng Rapberry',
            'tomtat'=>'Lập trình IoT điều khiển thiết bị trong nhà sử dụng Rapberry',
            'tiendo'=>'55','thamkhao'=> 0,'daduyet'=>1,'idsinhvien'=> 1,'idgvhd'=> 1]
        ]);
        sukien::insert([
            ['tensukien' => 'Đội SQ26 - TCU chiến thắng rực rỡ tại vòng bán kết Cuộc thi Cuộc đua số khu vực miền Nam',
            'tomtat'=>'Đội SQ26 - TCU chiến thắng rực rỡ tại vòng bán kết Cuộc thi Cuộc đua số khu vực miền Nam', 
            'noidung'=>'<h2>Đội SQ26 - TCU chiến thắng rực rỡ tại v&ograve;ng b&aacute;n kết Cuộc thi Cuộc đua số khu vực miền Nam</h2>

            <p>Được khởi động từ th&aacute;ng 11/2018 với sự đồng h&agrave;nh của VTV (Đ&agrave;i truyền h&igrave;nh Việt Nam) v&agrave; sự bảo trợ của Bộ Khoa học v&agrave; C&ocirc;ng nghệ, Bộ Th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng.... V&ograve;ng b&aacute;n kết cuộc thi Cuộc đua số 2018 - 2019 khu vực miền Nam đ&atilde; diễn ra l&uacute;c 14.00 ng&agrave;y 07/4/2019 tại Nh&agrave; thi đấu Đại học B&aacute;ch khoa (Cơ sở 2), Đại học quốc gia TP.Hồ Ch&iacute; Minh, l&agrave;ng Đại học quốc gia, thị x&atilde; Dĩ An, tỉnh B&igrave;nh Dương.<br />
            &nbsp;</p>
            
            <p><img alt="" src="http://tcu.edu.vn/sites/www/dataupload/files/cms/BK-CDS1.jpg" /><br />
            <br />
            <em>Ban Tổ chức trao giải cho c&aacute;c đội thi</em></p>
            
            <p>&nbsp;<br />
            V&ograve;ng sơ khảo ở hai khu vực Nam bộ v&agrave; miền Trung, T&acirc;y Nguy&ecirc;n trong th&aacute;ng 1/2019, đ&atilde; chọn ra 8 đội xuất sắc nhất v&agrave;o v&ograve;ng b&aacute;n kết khu vực miền Nam. Trong đ&oacute;, đến từ ĐH B&aacute;ch khoa TP.Hồ Ch&iacute; Minh c&oacute; 2 đội: KOR v&agrave; PPL Lover; 2 đại diện của Trường ĐH Lạc Hồng l&agrave; đội LHU Speed v&agrave; LHU The Walkers. Hai th&agrave;nh vi&ecirc;n của ĐH Khoa học tự nhi&ecirc;n TP.Hồ Ch&iacute; Minh l&agrave; HCMUS Team 09 v&agrave; Dateh IT c&ugrave;ng đội CDSNT2 (Trường ĐH Nha Trang) v&agrave; SQ26 của Trường ĐH Th&ocirc;ng tin li&ecirc;n lạc.<br />
            &nbsp;<br />
            Đề thi tại v&ograve;ng b&aacute;n kết năm nay (theo đ&aacute;nh gi&aacute; của Ban Tổ chức v&agrave; c&aacute;c chuy&ecirc;n gia) được cho l&agrave; kh&oacute; hơn nhiều so với hai năm trước. C&aacute;c đội thi sẽ phải lập tr&igrave;nh để xe chạy được theo l&agrave;n đường trong điều kiện &aacute;nh s&aacute;ng thay đổi; tr&aacute;nh đi l&ecirc;n vỉa h&egrave;; khoanh v&ugrave;ng, x&aacute;c định v&agrave; tr&aacute;nh được c&aacute;c vật cản (với h&igrave;nh d&aacute;ng bất kỳ) xuất hiện tr&ecirc;n đường, tự động ph&acirc;n t&iacute;ch loại vật cản để từ đ&oacute; &quot;ra quyết định&quot; di chuyển; nhận dạng v&agrave; h&agrave;nh động được theo biển b&aacute;o giao th&ocirc;ng được thay đổi ngẫu nhi&ecirc;n. Để đ&aacute;p ứng với c&aacute;c b&agrave;i to&aacute;n c&ocirc;ng nghệ ng&agrave;y c&agrave;ng cao đ&oacute;, tại cuộc thi năm nay, FPT cũng đ&atilde; cho n&acirc;ng cấp m&ocirc; h&igrave;nh &quot;xe tự h&agrave;nh&quot; l&ecirc;n tỷ lệ 1/7 thay cho 1/10 so với trước.<br />
            &nbsp;<br />
            &nbsp;Theo thể lệ của cuộc thi, mỗi đội c&oacute; 2 lượt thi đấu tr&ecirc;n sa h&igrave;nh (1 lượt tr&ecirc;n &quot;s&acirc;n đỏ&quot; v&agrave; 1 lượt tr&ecirc;n &quot;s&acirc;n xanh&quot;). Mỗi lượt gồm 2 ph&uacute;t chuẩn bị v&agrave; 3 ph&uacute;t thi đấu; c&aacute;c đội chuẩn bị xong đưa xe v&agrave;o vạch xuất ph&aacute;t, sau hiệu lệnh của trọng t&agrave;i, xe đua phải tự động xuất ph&aacute;t. Trong 3 ph&uacute;t thi đấu của mỗi lượt, mỗi đội c&oacute; thể chạy số v&ograve;ng t&ugrave;y &yacute;, Ban Tổ chức sẽ t&iacute;nh điểm dựa tr&ecirc;n v&ograve;ng thi c&oacute; kết quả cao nhất của đội thi. Khi xe bị sự cố...hoặc vi phạm quy chế cuộc thi, lượt chạy đ&oacute; kh&ocirc;ng được t&iacute;nh, đội thi phải đưa xe quay về vạch xuất ph&aacute;t v&agrave; thi lại (kh&ocirc;ng giới hạn lượt khởi động lại).<br />
            &nbsp;<br />
            Kết quả thi đấu được t&iacute;nh theo thời gian ngắn nhất khi đội thi ho&agrave;n th&agrave;nh một v&ograve;ng đua ho&agrave;n chỉnh (t&iacute;nh từ điểm xuất ph&aacute;t, đi qua c&aacute;c mốc địa điểm do Ban Tổ chức đặt sẵn, quay về điểm ban đầu). Nếu đội thi kh&ocirc;ng ho&agrave;n th&agrave;nh được trọn vẹn một v&ograve;ng đua, kết quả được t&iacute;nh theo qu&atilde;ng đường xa nhất đội đ&oacute; đi được. Trong trường hợp 2 đội c&oacute; c&ugrave;ng qu&atilde;ng đường, đội thi c&oacute; thời gian xe chạy &iacute;t hơn được t&iacute;nh kết quả cao hơn.<br />
            &nbsp;</p>
            
            <p><img alt="" src="http://tcu.edu.vn/sites/www/dataupload/files/cms/BK-CDS2.jpg" /><br />
            <br />
            <em>C&aacute;c th&agrave;nh vi&ecirc;n trong đo&agrave;n c&ocirc;ng t&aacute;c của Nh&agrave; trường chụp ảnh lưu niệm sau khi nhận giải thưởng</em></p>
            
            <p>&nbsp;<br />
            Với tinh thần quyết t&acirc;m cao, sự chuẩn bị kỹ lưỡng v&agrave; t&iacute;ch cực luyện tập, c&ugrave;ng với c&aacute;c phương &aacute;n chiến thuật hợp l&yacute;, &quot;c&aacute;c ch&agrave;ng trai &aacute;o l&iacute;nh&quot; của Trường ĐH Th&ocirc;ng tin li&ecirc;n lạc đ&atilde; l&agrave;m cho kh&aacute;n giả &quot;ngỡ ng&agrave;ng&quot; khi vượt qua c&aacute;c đối thủ &ldquo;nặng k&yacute;&rdquo; với số điểm cao nhất, gi&agrave;nh quyền v&agrave;o v&ograve;ng chung kết cuộc thi Cuộc đua số to&agrave;n quốc sẽ diễn ra v&agrave;o ng&agrave;y 25/5/2019 tại H&agrave; Nội. Như vậy, với việc lần đầu ti&ecirc;n tham gia cuộc thi Cuộc đua số v&agrave; trở th&agrave;nh một trong t&aacute;m đội tuyển mạnh nhất cả nước, SQ26 kh&ocirc;ng những đ&atilde; ho&agrave;n th&agrave;nh xuất sắc chỉ ti&ecirc;u đặt ra, m&agrave; c&ograve;n khiến Ban Tổ chức, c&aacute;c đối thủ v&agrave; kh&aacute;n giả phải &quot;ngưỡng mộ&quot; trước th&agrave;nh t&iacute;ch &ldquo;đua&rdquo; trong cả 2 v&ograve;ng thi.... G&oacute;p mặt c&ugrave;ng SQ26 tại v&ograve;ng chung kết c&ograve;n c&oacute; c&aacute;c đội CDSNTU2 (Trường ĐH Nha Trang), đội DaTeh IT (Đại học Khoa học tự nhi&ecirc;n TP. Hồ Ch&iacute; Minh) v&agrave; đội LHU The Walkers (Trường ĐH Lạc Hồng) c&ugrave;ng &quot;top 4&quot; c&aacute;c đội tuyển của c&aacute;c trường đại học khu vực miền Bắc kh&aacute;c. Ngay sau khi x&aacute;c định được &quot;top 4 b&aacute;n kết khu vực miền Nam&quot;, Ban tổ chức đ&atilde; c&ocirc;ng bố đề thi tại v&ograve;ng chung kết Cuộc thi Cuộc đua số to&agrave;n quốc. Đội v&ocirc; địch tại v&ograve;ng chung kết sẽ được nhận phần thưởng c&oacute; gi&aacute; trị hơn 1,1 tỷ đồng, trong đ&oacute; c&oacute; 15 triệu đồng tiền mặt; một chuyến trải nghiệm, t&igrave;m hiểu về c&ocirc;ng nghệ mới tại Nhật Bản trong một tuần, một suất học bổng tiến sĩ trị gi&aacute; 700 triệu đồng d&agrave;nh cho th&iacute; sinh xuất sắc nhất,...;<br />
            &nbsp;<br />
            Với bản lĩnh, tr&iacute; tuệ, t&agrave;i năng của những sĩ quan chỉ huy, tham mưu th&ocirc;ng tin tương lai.... Hy vọng, đội SQ26 của Trường ĐH Th&ocirc;ng tin li&ecirc;n lạc sẽ lại thi đấu xuất sắc tạo n&ecirc;n điều bất ngờ lớn tại v&ograve;ng chung kết Cuộc thi Cuộc đua số to&agrave;n quốc sắp tới.</p>
            
            <p><strong><em>CTV</em></strong></p>',
            'img'=>'img/BK-CDS2.jpg'],

            ['tensukien' => 'Ban đề tài cấp Bộ Quốc phòng tổ chức khảo sát, tọa đàm tại các đơn vị thông tin trên địa bàn Quân khu 5',
            'tomtat'=>'Ban đề tài cấp Bộ Quốc phòng tổ chức khảo sát, tọa đàm tại các đơn vị thông tin trên địa bàn Quân khu 5', 
            'noidung'=>'<h2>Ban đề t&agrave;i cấp Bộ Quốc ph&ograve;ng tổ chức khảo s&aacute;t, tọa đ&agrave;m tại c&aacute;c đơn vị th&ocirc;ng tin tr&ecirc;n địa b&agrave;n Qu&acirc;n khu 5</h2>

            <p>Chiều ng&agrave;y 04/4/2018, tại Lữ đo&agrave;n Th&ocirc;ng tin 575/QK5 (Đ&agrave; Nẵng), Ban đề t&agrave;i cấp Bộ Quốc ph&ograve;ng &ldquo;Ph&aacute;t triển l&yacute; luận tổ chức, bảo đảm th&ocirc;ng tin li&ecirc;n lạc trong t&aacute;c chiến ph&ograve;ng thủ qu&acirc;n khu&rdquo;&nbsp;đ&atilde; tổ chức tọa đ&agrave;m, trao đổi sau khi khảo s&aacute;t, thu thập th&ocirc;ng tin tại c&aacute;c đơn vị th&ocirc;ng tin tr&ecirc;n địa b&agrave;n Qu&acirc;n khu 5. Đại t&aacute;, PGS.TS B&ugrave;i Sơn H&agrave; - Hiệu trưởng, Chủ nhiệm đề t&agrave;i chủ tr&igrave; buổi tọa đ&agrave;m.</p>
            
            <p>&nbsp;</p>
            
            <p><img alt="" src="http://tcu.edu.vn/sites/www/dataupload/files/cms/Anh%20soan%20tin%20cho%20Web/Nam%20hoc%202017-2018/Quy2.2018/Toadamdetai.jpg" /></p>
            
            <p>&nbsp;</p>
            
            <p><br />
            Tham dự tọa đ&agrave;m c&oacute; đại biểu Bộ Tham mưu Qu&acirc;n khu 5;&nbsp;đại biểu Lữ đo&agrave;n Th&ocirc;ng tin 132/Binh chủng Th&ocirc;ng tin li&ecirc;n lạc; đại biểu Bộ chỉ huy qu&acirc;n sự th&agrave;nh phố Đ&agrave; Nẵng; đại biểu&nbsp;chỉ huy Ph&ograve;ng Th&ocirc;ng tin Qu&acirc;n khu; Chỉ huy Lữ đo&agrave;n, ban chỉ huy c&aacute;c tiểu đo&agrave;n v&agrave; c&aacute;n bộ, sĩ quan c&aacute;c cơ quan trực thuộc Lữ đo&agrave;n Th&ocirc;ng tin 575.<br />
            &nbsp;<br />
            Sau khi nghe b&aacute;o c&aacute;o đề dẫn v&agrave; gợi &yacute; của đồng ch&iacute; Chủ nhiệm đề t&agrave;i, c&aacute;c đại biểu đ&atilde; tiến h&agrave;nh thảo luận, trao đổi, đ&oacute;ng g&oacute;p &yacute; kiến l&agrave;m r&otilde; những luận chứng, đồng thời cung cấp th&ecirc;m c&aacute;c luận cứ khoa học cho đề t&agrave;i. Nội dung thảo luận xoay quanh c&aacute;c vấn đề: x&acirc;y dựng thế trận th&ocirc;ng tin li&ecirc;n lạc của qu&acirc;n khu; Tổ chức hệ thống th&ocirc;ng tin trong t&aacute;c chiến ph&ograve;ng thủ qu&acirc;n khu; c&ocirc;ng t&aacute;c phối hợp giữa th&ocirc;ng tin qu&acirc;n khu với c&aacute;c lực lượng th&ocirc;ng tin kh&aacute;c tr&ecirc;n địa b&agrave;n; tổ chức bi&ecirc;n chế trang bị phương tiện th&ocirc;ng tin của lực lượng th&ocirc;ng tin qu&acirc;n khu; thực trạng trang bị phương tiện th&ocirc;ng tin v&agrave; định hướng ph&aacute;t triển trong tương lai; thực trạng nguồn nh&acirc;n lực bảo đảm th&ocirc;ng tin li&ecirc;n lạc; c&ocirc;ng t&aacute;c huấn luyện, luyện tập, diễn tập; những kh&oacute; khăn, kiến nghị của c&aacute;c đơn vị th&ocirc;ng tin qu&acirc;n khu; ...<br />
            <br />
            Buổi tọa đ&agrave;m đ&atilde; diễn ra s&ocirc;i nổi v&agrave; th&agrave;nh c&ocirc;ng tốt đẹp. Ban đề t&agrave;i đ&atilde; nhận được nhiều &yacute; kiến đ&oacute;ng g&oacute;p bổ &iacute;ch từ kinh nghiệm thực tiễn tổ chức, bảo đảm th&ocirc;ng tin li&ecirc;n lạc v&agrave; x&acirc;y dựng đơn vị của c&aacute;c đại biểu. Qua đ&oacute;, Ban đề t&agrave;i tiếp tục nghi&ecirc;n cứu ho&agrave;n chỉnh c&aacute;c nội dung ch&iacute;nh cần giải quyết m&agrave; mục ti&ecirc;u đề t&agrave;i đ&atilde; đặt ra. Theo kế hoạch, ban đề t&agrave;i sẽ tiếp tục khảo s&aacute;t, nghi&ecirc;n cứu thực tiễn tại một số qu&acirc;n khu v&agrave; c&aacute;c đơn vị th&ocirc;ng tin trong to&agrave;n qu&acirc;n.</p>
            
            <p><br />
            <strong><em>CTV</em></strong></p>',
            'img'=>'img/Toadamdetai.jpg'],
            
            ['tensukien' => 'Trường Đại học Thông tin liên lạc đạt giải cao tại vòng Sơ khảo Cuộc đua số năm 2019 do FPT tổ chức',
            'tomtat'=>'Trường Đại học Thông tin liên lạc đạt giải cao tại vòng Sơ khảo Cuộc đua số năm 2019 do FPT tổ chức',
            'noidung'=>'<h2>Trường Đại học Th&ocirc;ng tin li&ecirc;n lạc đạt giải cao tại v&ograve;ng Sơ khảo Cuộc đua số năm 2019 do FPT tổ chức</h2>

            <p>Chiều ng&agrave;y 16/01, v&ograve;ng Sơ khảo Cuộc đua số năm 2019 do Tập đo&agrave;n FPT tổ chức đ&atilde; ch&iacute;nh thức diễn ra tại Hội trường F, Trường Đại học B&aacute;ch khoa Đ&agrave; Nẵng với 12 đội đại diện cho 4 trường đại học thuộc khu vực Miền Trung tham gia tranh t&agrave;i. Trường Đại học th&ocirc;ng tin li&ecirc;n lạc c&oacute; 6 đội tham gia (SQ26/Tiểu đo&agrave;n 26, TCU STT/Tiểu đo&agrave;n 30, TCU Racer/Tiểu đo&agrave;n 28, H20/Hệ 20, AT_AI/Khoa Kỹ thuật viễn th&ocirc;ng, K6_AITech/Khoa C&ocirc;ng nghệ th&ocirc;ng tin)</p>
            
            <p><em>&nbsp;<img alt="" src="http://tcu.edu.vn/sites/www/dataupload/files/cms/Anh%20soan%20tin%20cho%20Web/Nam%202019/Quy%201.2019/CDS0.jpeg" /><br />
            <br />
            C&aacute;c đội của Nh&agrave; trường tham dự Cuộc thi</em></p>
            
            <p>Ngo&agrave;i 6 đội của Trường Đại học th&ocirc;ng tin li&ecirc;n lạc c&ograve;n c&oacute; 1 đội của Trường Đại học Nha Trang, 2 đội của Trường Đại học Quy Nhơn v&agrave; 3 đội của Trường Đại học B&aacute;ch khoa Đ&agrave; Nẵng. C&aacute;c đội tham gia tranh t&agrave;i qua 3 phần thi với thể thức loại trực tiếp: Xử l&yacute; ảnh, Phản biện v&agrave; Lập tr&igrave;nh nhanh. Cơ cấu điểm cho 3 phần lần lượt l&agrave; 40%, 30% v&agrave; 30%. Sẽ c&oacute; 6 đội đạt điểm số cao nhất ở phần Xử l&yacute; ảnh được Ban Tổ chức lựa chọn v&agrave;o thi phần Phản biện. Ở phần Phản biện, Ban Tổ chức lựa chọn 4 đội c&oacute; điểm số cao nhất để v&agrave;o thi phần Lập tr&igrave;nh nhanh. Hai đội đạt điểm cao nhất ở v&ograve;ng Sơ khảo sẽ được lựa chọn thi v&ograve;ng B&aacute;n kết v&agrave;o th&aacute;ng 3 năm 2019 tại th&agrave;nh phố Hồ Ch&iacute; Minh.<br />
            &nbsp;<br />
            Trong phần Xử l&yacute; ảnh: C&aacute;c đội tiến h&agrave;nh lập tr&igrave;nh cho chiếc xe ảo chạy tr&ecirc;n sa h&igrave;nh, thời gian lập tr&igrave;nh l&agrave; 30 ph&uacute;t, thời gian chạy l&agrave; 2 ph&uacute;t. Kết th&uacute;c phần Xử l&yacute; ảnh c&oacute; 3 đội của Nh&agrave; trường đứng ở vị tr&iacute; thứ 2, 3, 6 (đội SQ26/Tiểu đo&agrave;n 26, đội TCU Racer/Tiểu đo&agrave;n 28, đội TCU STT/Tiểu đo&agrave;n 30) v&agrave; lọt v&agrave;o v&ograve;ng trong. C&ugrave;ng đi tiếp v&agrave;o v&ograve;ng trong c&oacute; đội Cosntu2 của Trường Đại học Nha Trang (đứng ở vị tr&iacute; thứ 1) v&agrave; 2 đội của Trường Đại học B&aacute;ch khoa Đ&agrave; Nẵng (đứng ở vị tr&iacute; thứ 4 v&agrave; thứ 5).<br />
            &nbsp;<br />
            Trong phần thi Phản biện: C&aacute;c đội thi c&oacute; 2 ph&uacute;t để tr&igrave;nh b&agrave;y thuật to&aacute;n, 2 ph&uacute;t trả lời chất vấn của đội bạn v&agrave; 3 ph&uacute;t trả lời c&aacute;c c&acirc;u hỏi của Ban Gi&aacute;m khảo. Kết quả sau phần thi Phản biện, đội Cosntu2 của Trường Đại học Nha Trang vẫn tiếp tục đứng ở vị tr&iacute; thứ 1, xếp thứ 2 l&agrave; đội SQ26/Tiểu đo&agrave;n 26, xếp thứ 3 l&agrave; đội TCU Racer/Tiểu đo&agrave;n 28, thứ 4 l&agrave; đội Duckies của Trường Đại học B&aacute;ch khoa Đ&agrave; Nẵng v&agrave; tiếp tục đi tiếp v&agrave;o phần thi Lập tr&igrave;nh nhanh.<br />
            &nbsp;<br />
            &nbsp;</p>
            
            <p><img alt="" src="http://tcu.edu.vn/sites/www/dataupload/files/cms/Anh%20soan%20tin%20cho%20Web/Nam%202019/Quy%201.2019/CDS1..jpeg" /><br />
            <br />
            <em>Đội SQ26/Tiểu đo&agrave;n 26 nhận giải Nhất do Ban Tổ chức Cuộc thi trao</em></p>
            
            <p>&nbsp;<br />
            Ở phần thi Lập tr&igrave;nh nhanh, c&aacute;c đội đ&atilde; xuất sắc ho&agrave;n th&agrave;nh c&aacute;c b&agrave;i thi của m&igrave;nh. Kh&ocirc;ng kh&iacute; trở n&ecirc;n s&ocirc;i động hơn khi sang b&agrave;i lập tr&igrave;nh số 2 v&agrave; số 3, đội SQ26/Tiểu đo&agrave;n 26 đ&atilde; xuất sắc vượt qua c&aacute;c đội để vươn l&ecirc;n dẫn đầu. Kết quả chung cuộc, đội SQ26/Tiểu đo&agrave;n 26 đ&atilde; gi&agrave;nh chiến thắng sau 3 v&ograve;ng thi với tổng số điểm vượt trội l&agrave; 8.98, xếp thứ 2 l&agrave; đội của Trường Đại học Nha Trang với số điểm 8.11, c&ugrave;ng đứng ở vị tr&iacute; thứ 3 l&agrave; đội TCU Racer/Tiểu đo&agrave;n 28 v&agrave; đội Duckies của Trường Đại học B&aacute;ch khoa Đ&agrave; Nẵng.<br />
            &nbsp;<br />
            Đội đạt giải Nhất v&agrave; giải Nh&igrave; được trao m&ocirc; h&igrave;nh xe đua mới để l&agrave;m quen khi chạy ở m&ocirc;i trường thực tế. Ri&ecirc;ng đội SQ26/Tiểu đo&agrave;n 26 đạt giải Nhất được nhận tiền thưởng bằng tiền mặt l&agrave; 5 triệu đồng v&agrave; c&oacute; cơ hội được nhận 1 xuất học bổng to&agrave;n phần kh&oacute;a đ&agrave;o tạo Automative online do FPT tổ chức trị gi&aacute; 20 triệu đồng.<br />
            &nbsp;</p>
            
            <p><strong><em>Việt Dũng</em></strong></p>',
            'img'=>'img/CDS0.jpeg']
        ]);
    }
}
