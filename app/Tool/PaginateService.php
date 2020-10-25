<?php

namespace App\Service\Other;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class PaginateService
{
    //#total: 2
    //#lastPage: 1
    //#perPage: "10"
    //#currentPage: 1
    //#path: "/"
    //#query: []
    //#fragment: null
    //#pageName: "page"
    //+onEachSide: 3
    //+"url": "/UserManage"

    public function Url($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function PreviousPage($NowPage)
    {
        return ($NowPage == 1) ? 1 : ($NowPage - 1);
    }

    public function NextPage($NowPage, $lastPage)
    {
        return (($NowPage == $lastPage) ? ($NowPage + 1) : $lastPage);
    }

    public function Compute(int $NowPage, Collection $data, $lastPage)
    {

        // Ex
        /*
            <nav aria-label="page navigation" class="page mt-5">
                <ul class="pagination justify-content-center">
                    @if( $Paginate->total() >= 11 )
                        @if( $Paginate->currentPage() != 1 && $Paginate->total() >= 2 )
                            <li class="page-item disabled ">
                                <a class="btn btn-page pre" href="{{route('UserManage.index',[
                                    'NowPage' => $PreviousPage
                                ])}}" tabindex="-1" aria-disabled="true">PREV</a>
                            </li>
                        @endif

                        @for($i = 1; $i<= $Paginate->lastPage(); $i++)
                            <li class="page-item">
                                <a class="btn btn-page {{ ($NowPage == $i)?'active':'' }}" href="{{route('UserManage.index', [
                                    'NowPage' => $i
                                ])}}">{{$i}}</a>
                            </li>
                        @endfor

                        {{--@if( $Paginate->lastPage() >= 10 )--}}
                            {{--<li class="page-item">--}}
                                {{--<a class="btn btn-page" href="{{route('UserManage.index', [--}}
                                    {{--'NextPage' => ($Paginate->lastPage() + 1)--}}
                                {{--])}}">{{($Paginate->lastPage() + 1)}}</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}

                        @if( $Paginate->currentPage() != $Paginate->lastPage()  && $Paginate->total() >= 2 )
                            <li class="page-item disabled ">
                                <a class="btn btn-page pre" href="{{route('UserManage.index',[
                                    'NowPage' => $NextPage
                                ])}}" tabindex="-1" aria-disabled="true">NEXT</a>
                            </li>
                        @endif

                    @endif
                </ul>
            </nav>
        */

        //        @if( $Paginate->total() >= 11 )
//        <label class="mb-0">頁數</label>
//        <select id="ChangePage" class="btn btn-water">
//
//        @if( $MiddleStart != 1 )
//        <option value="{{ $PreviousPage }}"> {{ $PreviousPage  }} </option>
//        @endif
//
//        @for($i = $MiddleStart; $i <= $MiddleEnd; $i++)
//        <option {{ ($i == $NowPage)?'selected':'' }} value="{{ $i }}"> {{ $i }} </option>
//        @endfor
//
//        @if( $Paginate->currentPage() != $Paginate->lastPage()  && $Paginate->total() >= 2 )
//        <option value="{{ $NextPage }}"> {{ $NextPage  }} </option>
//        @endif
//        </select>
//        @endif

        //@section('JS')
        //{{--<script>--}}
        //{{--$('#ChangePage').change(function (i) {--}}
        //{{--$("#SetPage").val(i.target.value);--}}
        //{{--$('#FormChangePage').submit();--}}
        //{{--});--}}
        //{{--</script>--}}
        //@stop

        //{{--<form id="FormChangePage" action="{{ route('Back.Setting.Index') }}" method="GET" enctype="multipart/form-data">--}}
        //{{--@csrf--}}
        //{{--<input id="SetPage" name="NowPage" type="hidden">--}}
        //{{--<input value="{{ $KeyWord }}" name="KeyWord" type="hidden">--}}
        //{{--</form>--}}

        $MiddleStart = 1;
        $MiddleEnd = 10;

        if ($data->count() <= 100) {
            $MiddleStart = 1;
            $MiddleEnd = intval(ceil($data->count() / 10));
            return [
                'MiddleStart' => $MiddleStart
                , 'MiddleEnd' => $MiddleEnd
            ];
        }

        if ($NowPage >= 11) {
            if ($NowPage >= 11 && $NowPage <= 20) {
                $MiddleStart = 11;
                //$MiddleEnd   = $MiddleStart + 9;
                $MiddleEnd = ($lastPage >= 19) ? 19 : $lastPage;
            } else {
                if (($NowPage % 10) === 0) {
                    $MiddleStart = ($NowPage - 9);
                } else {
                    $StrLength = (strlen($NowPage) < 3) ? 1 : (strlen($NowPage) - 1);
                    $MiddleStart = substr($NowPage, 0, $StrLength) . '1';
                }
                $LimitStartPage = (intval($MiddleStart) + 9);
                $LimitEndPage = intval(ceil($data->count() / 10));
                $MiddleEnd = ($LimitStartPage >= $LimitEndPage) ? $LimitEndPage : $LimitStartPage;
            }
        }

        return [
            'MiddleStart' => $MiddleStart
            , 'MiddleEnd' => $MiddleEnd
        ];
    }
}
