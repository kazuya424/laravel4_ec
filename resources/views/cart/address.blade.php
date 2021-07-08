<div class="row">
    <div class="col-sm-12">
        <div class="border border-dark mt-3">
            <p class="ml-1">お届け先</p>
            <p class="ml-3">〒{{ $user->ZipcodeWithHyphen }}&nbsp;{{ $user->fullAddress }}&nbsp;{{ $user->PhoneNumberWithHyphe }}</p>
            <div>
                <p class="offset-sm-4">{{ $user->fullName }}様</p>
            </div>
        </div>
    </div>
</div>
