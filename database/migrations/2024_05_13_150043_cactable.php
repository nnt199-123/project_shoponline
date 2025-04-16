<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nha_sx', function (Blueprint $table) {
            $table->id();
            $table->string('ten', 50);
            $table->boolean('thutu')->default(0);
            $table->boolean('anhien')->default(1);
            $table->timestamps();
        });
        Schema::create('tinh_chat',function(Blueprint $table){
            $table->id();
            $table->string('ten',50);
            $table->timestamps();
        });
        Schema::create('san_pham', function (Blueprint $table){
            $table->id();
            $table->string('ten',50);
            $table->integer('idnhasx');
            $table->integer('gia')->default(0);
            $table->integer('giakm')->default(0);
            $table->string('hing',255)->nullable();
            $table->date('ngay')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('xem')->default(0);
            $table->boolean('hot')->default(0);
            $table->boolean('anhien')->default(1);
            $table->boolean('tinhchat')->default(0);
            $table->string('mausac',50)->nullable();
            $table->string('cannang',50)->nullable();
            $table->timestamps();
        });
        Schema::create('doi_tac', function (Blueprint $table) {
            $table->id();
            $table->string('hinh')->nullable();
            $table->integer('thu_tu')->default(0);
            $table->boolean('an_hien')->default(0);             
            $table->timestamps();
        });
        Schema::create('binh_luan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_sp')->comment('Mã sản phẩm');
            $table->integer('id_user')->comment('Người bình luận');
            $table->text('noi_dung')->comment('Nội dung bình luận');
            $table->datetime('thoi_diem')->comment('Thời điểm bình luận');
            $table->boolean('an_hien')->default(0)->comment('0 là ẩn 1 là hiện');             
            $table->timestamps();
        });
        Schema::create('don_hang_chi_tiet', function (Blueprint $table) {
            $table->id();
            $table->integer('id_dh')->comment('Mã đơn hàng');
            $table->integer('id_sp')->comment('Mã sản phẩm');
            $table->integer('so_luong')->default(1)->comment('Số lượng mua');   
            $table->integer('gia')->comment('Giá mua sản phẩm');                    
            $table->timestamps();
        });
        
        
    }
    public function down(): void
    {
        Schema::dropIfExists('nha_sx');
        Schema::dropIfExists('tinh_chat');
        Schema::dropIfExists('san_pham');
        Schema::dropIfExists('don_hang_chi_tiet');
        Schema::dropIfExists('binh_luan');
        Schema::dropIfExists('doi_tac');

    }
};
