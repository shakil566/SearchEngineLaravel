{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}

<div class="container">
    <h1 class="header margin-bottom-10">@lang('english.USER_DETAILS')</h1>
    <button class="btn btn-sm btn-success mb-5">
        <a class="info-btn" href="{{ URL::to('api/userRole') }}" target="_blank">@lang('english.ALL_DETAILS_API')</a>
    </button>
    <div class="row">
        <div class="table-responsive table-bg">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr class="center">
                        <th class="text-center">@lang('english.SL_NO')</th>
                        <th class="text-center">@lang('english.NAME')</th>
                        <th class="text-center">@lang('english.EMAIL')</th>
                        <th class="text-center">@lang('english.ROLE')</th>
                        <th class="text-center">@lang('english.DETAILS_WITH_API')</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {!! Helper::upperCase('test!!') !!} --}}
                    {{-- {!! Helper::stringToArrayToName('1', $roleArr) !!} --}}
                    @if (!empty($targetArr))
                        <?php
                        $sl = 0;
                        ?>

                        {{-- <?php dd($roleArr); ?> --}}
                        <?php
                        // print((new \App\Helpers\Helper)->stringToArrayToName('1,2', $roleArr));
                        // exit;
                        ?>
                        @foreach ($targetArr as $target)
                            <?php
                            $roleText = (new \App\Helpers\Helper())->stringToArrayToName($target->role_id, $roleArr);
                            ?>
                            <tr class="text-center">
                                <td>{{ ++$sl }}</td>
                                <td>{{ $target->user->name ?? '' }}</td>
                                <td>{{ $target->user->email ?? '' }}</td>
                                <td>{{ $roleText ?? '' }}</td>
                                <td>
                                    <button class="btn btn-sm btn-success">
                                        <a class="info-btn"
                                            href="{{ URL::to('api/userRole/show') . '/' . $target->user->id }}"
                                            target="_blank">@lang('english.INFO')</a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('english.NO_USER_FOUND')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
