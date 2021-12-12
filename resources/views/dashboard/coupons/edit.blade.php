@extends('dashboard.layouts.master')

@section('content')

    @include('dashboard.partials.errors')
    @include('dashboard.partials.success')

    <form class="form" method="POST" action="{{ route('dashboard.coupons.update', $coupon->id) }}">
        @csrf
        @method('PUT')

        <div class="form-body">
            <h4 class="form-section"><i class="ft-user"></i> تعديل الوقت</h4>
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="code">كود الخصم</label>
                        <input type="text" id="code" class="form-control" placeholder="كود الخصم" name="code" value="{{ old('code', $coupon->code) }}" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="title_en">نوع الكوبون</label>
                        <select name="type" id="type" class="form-control select2">
                            <option value="percent" {{ $coupon->type == 'percent' ? 'selected' : '' }}>نسبة مئوية</option>
                            <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>ثابت</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="value">القيمة</label>
                        <input type="number" id="value" class="form-control" placeholder="القيمة" name="value" value="{{ old('value', $coupon->value) }}" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="usage_limit">عدد المستفيدين المسموح به</label>
                        <input type="number" id="usage_limit" class="form-control" placeholder="عدد المستفيدين المسموح به" name="usage_limit" value="{{ old('usage_limit', $coupon->usage_limit) }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="start_date">تاريخ البداية</label>
                        <input type="date" id="start_date" class="form-control" placeholder="تاريخ البداية" name="start_date" value="{{ old('start_date', $coupon->start_date) }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="end_date">تاريخ الانتهاء</label>
                        <input type="date" id="end_date" class="form-control" placeholder="تاريخ الانتهاء" name="end_date" value="{{ old('end_date', $coupon->end_date) }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="active">الحالة</label>
                        <select name="active" id="active" class="form-control select2">
                            <option value="1" {{ $coupon->active == '1' ? 'selected' : '' }}>فعال</option>
                            <option value="0" {{ $coupon->active == '0' ? 'selected' : '' }}>متوقف</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="specific_users">تخصيص طلاب</label>
                        <select name="specific_users[]" id="specific_users" class="form-control select2" multiple>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ in_array($user->id, $coupon->students->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="limit_user">مرة واحدة لكل طالب</label>
                        <input type="checkbox" name="limit_user" id="limit_user" data-color="danger" {{ $coupon->limit_user == 1 ? 'checked' : '' }} class="toggle-status switchery" />
                    </div>
                </div>


            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="la la-check-square-o"></i> تحديث
            </button>
            <button type="reset" class="btn btn-warning mr-1">
                <i class="ft-x"></i> إلغاء
            </button>
        </div>

    </form>

@endsection
