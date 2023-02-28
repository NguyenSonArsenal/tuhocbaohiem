@if ($errors->any())
    <div class="error alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card-body">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Họ và tên <span class="text-danger">(*)</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="teacher_fullname" value="{{ $entity->teacher_fullname }}" placeholder="Nhập họ và tên">
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Email <span class="text-danger">(*)</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="teacher_email" value="{{ $entity->teacher_email }}"  placeholder="Nhập email">
                </div>
            </div>
            <div class="form-group row">
                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nơi công tác <span class="text-danger">(*)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="teacher_word_place" value="{{ $entity->teacher_word_place }}" placeholder="Nhập nơi công tác">
                </div>
            </div>
            <div class="form-group row">
                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Môn dạy</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="teacher_subject" value="{{ $entity->teacher_subject }}"  placeholder="Nhập môn dạy">
                </div>
            </div>
            <div class="form-group row">
                <label for="email1" class="col-sm-3 text-right control-label col-form-label">Học vị</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="teacher_degree" value="{{ $entity->teacher_degree }}"  placeholder="Nhập học vị">
                </div>
            </div>
            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Link facebook</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="teacher_link_facebook" value="{{ $entity->teacher_link_facebook }}"  placeholder="Nhập link facebook">
                </div>
            </div>

            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Mô tả ngắn</label>
                <div class="col-sm-8">
                    <textarea  type="text" class="form-control" maxlength="255" rows="5" name="teacher_description" placeholder="Nhập mô tả ngắn về giảng viên">{{ $entity->teacher_description }} </textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Ảnh đại diện</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" name="teacher_avatar">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Lượt theo dõi</label>
                <div class="col-sm-8">
                    <input type="number" min="0" class="form-control" name="teacher_followed_number"
                           value="{{ $entity->teacher_followed_number }}" placeholder="Nhập số lượng học sinh theo dõi">
                </div>
            </div>
            <div class="form-group row">
                <label for="the_number_of_students" class="col-sm-3 text-right control-label col-form-label">Số học viên</label>
                <div class="col-sm-8">
                    <input type="number" min="0" class="form-control" name="the_number_of_students"
                           value="{{ $entity->the_number_of_students }}"  placeholder="Nhập số học viên đang theo học">
                </div>
            </div>
            <div class="form-group row">
                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Năm kinh nghiệm</label>
                <div class="col-sm-8">
                    <input type="number" min="0" class="form-control" name="teacher_years_of_experience_number"
                           value="{{ $entity->teacher_years_of_experience_number }}" placeholder="Nhập số năm kinh nghiệm">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-3 text-right control-label col-form-label">Trạng thái</label>
                <div class="col-md-8">
                    <div class="item_select_status">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="status1" name="status" class="custom-control-input"
                                   {{ $entity->status == statusOn() ? "checked" : '' }}
                                   value="{{ statusOn() }}">
                            <label class="custom-control-label" for="status1">{{ statusOnAlias() }}</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="status2" name="status" class="custom-control-input"
                                   {{ $entity->status == statusOff() ? "checked" : '' }}
                                   value="{{ statusOff() }}">
                            <label class="custom-control-label" for="status2">{{ statusOffAlias() }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="border-top">
    <div class="card-body">
        <button type="submit" class="btn btn-success">Gửi đi</button>
    </div>
</div>
