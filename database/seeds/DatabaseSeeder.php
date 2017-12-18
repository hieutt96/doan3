<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Student;
use App\Intership;
use App\Leader;
use App\Lecturer;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $numStu = 500;
        $names = ['Nguyễn Văn Hạo', 'Trần Văn Sơn', 'Nguyễn Hồng Quang', 'Nguyễn Văn Tuấn', 'Đoàn Dự', 'Phạm Văn Hải', 'Tấn Tài', 'Đào Quang Anh', 'Hỏa Văn Bạo', 'Hoàng	Thành Công',
            'Hoàng Đăng	Đức', 'Nguyễn Thu Hường', 'Ưng Hoàng Phúc', 'Hà Anh Tuấn', 'Đức Phúc', 'Bích Phương', 'Phương Ly'];
//
        $sDT = ['01245321563', '01452365225', '0145236254', '0986325652', '0985547745', '01232012254', '0989965523',
            '01245563325', '0987874785', '01212456632', '0904145523'];
//        $lop = ['CNTT2.1', 'CNTT2.2', 'CNTT2.3', 'CNTT2.4'];
//        $nenTangMongMuon = ['Mobie Android', 'Mobie IOS', 'JAVA Programming', '.NET Programming', 'PHP Programming',
//            'SystemAdmin', 'Web Programming', 'Desktop app Programming',
//            'Serve Side', 'Embedded'];
//        $khoa = ['K59', 'K60', 'K61', 'K62', 'K58', 'K57'];
//        $ctdt = ['Kỹ Sư', 'Tài Năng', 'Cử Nhân', 'Chất Lượng Cao'];
        $avatar = ['1', '2', '3', '4', '5', '6'];
//        $gioiTinh = ['0', '1'];
//        $laptop = ['0', '1'];
//        $diaChi = ['Hai Bà Trưng, Hà Nội', 'Thanh Xuân, Hà Nội', 'Hoàn Kiếm, Hà Nội', 'Ba Đình, Hà Nội', 'Từ Liêm, Hà Nội'];
//
//        for ($i = 0; $i < $numStu; $i++) {
//
//            $user = new User();
//            $user->name = $names[array_rand($names,1)];
//            $user->email = 'sinhvien_'.$i.'@gmail.com';
//            $user->password = bcrypt('123456');
//            $user->picture = '/image/ava/ava'.rand(1, 6).'.jpg';
//            $user->level = 1;
//            $user->status = 1;
//            $user->save();
//
//            $student = new Student();
//            $student->user_id = $user->id;
//            $student->lop = $lop[array_rand($lop, 1)];
//            $student->grade = $khoa[array_rand($khoa,1)];
//            $student->ctdt = $ctdt[array_rand($ctdt,1)];
//            $student->gender = $gioiTinh[array_rand($gioiTinh,1)];
//            $student->laptop = $laptop[array_rand($laptop,1)];
//            $student->address = $diaChi[array_rand($diaChi,1)];
//            $student->phone = $sDT[array_rand($sDT,1)];
//            $student->mssv = rand(2011, 2015).(1000 + 15*$i +3);
//            $student->CPA = rand(0,40)*0.1;
//            $student->TA = rand(300, 990);
//            $student->knlt_thanhthao = $nenTangMongMuon[array_rand($nenTangMongMuon,1)];
//            $student->save();
//
//            $intership = new Intership();
//            $intership->student_id = $student->id;
//            $intership->semester_id = rand(1,3);
//            $intership->company_id = rand(1,8);
//            $intership->status = 1;
//            $intership->save();
//        }

//        $numLeader = 80;
//        $phongBan = ['IT', 'Nhân Sự', 'Kế Toán'];
//        $chucVu = ['Trưởng Phòng', 'Phó Phòng', 'Nhân Viên Thường'];
//
//        for ($i = 0; $i < $numLeader; $i++) {
//            $user = new User();
//            $user->name = $names[array_rand($names, 1)];
//            $user->email = 'leader_' . $i . '@gmail.com';
//            $user->password = bcrypt('123456');
//            $user->picture = '/image/ava/ava' . rand(1, 6) . '.jpg';
//            $user->level = 3;
//            $user->status = 1;
//            $user->save();
//
//            $leader = new Leader();
//            $leader->user_id = $user->id;
//            $leader->company_id = rand(1, 8);
//            $leader->phone = $sDT[array_rand($sDT,1)];
//            $leader->phong_ban = $phongBan[array_rand($phongBan, 1)];
//            $leader->chuc_vu = $chucVu[array_rand($chucVu, 1)];
//            $leader->chuyenmon = $nenTangMongMuon[array_rand($nenTangMongMuon,1)];
//            $leader->save();
//        }

//        $numLeacturer = 30;
//        for ($i = 0; $i < $numLeacturer; $i++) {
//            $user = new User();
//            $user->name = $names[array_rand($names, 1)];
//            $user->email = 'lecturer_' . $i . '@gmail.com';
//            $user->password = bcrypt('123456');
//            $user->picture = '/image/ava/ava' . rand(1, 6) . '.jpg';
//            $user->level = 5;
//            $user->status = 1;
//            $user->save();
//
//            $lecturer = new Lecturer();
//            $lecturer->user_id = $user->id;
//            $lecturer->phone = $sDT[array_rand($sDT,1)];
//            $lecturer->save();
//        }

        for ($i = 546; $i < 655; $i++) {
            $user = User::find($i);
            $user->picture = '/upload/anhleader/ava' . $avatar[array_rand($avatar, 1)] . '.jpg';
            $user->save();
        }

    }
}
