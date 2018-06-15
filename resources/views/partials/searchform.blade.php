        <div class="row justify-content-md-center">
            <form class="col-md-6 col-md-offset-3 my-4" method="get" action="{{url('/search')}}">
            <div class="input-group">
                <span class="input-group-btn">
                <select class="form-control col-xs-4 searchindex_select" name="searchindex">
                    @foreach(\App\Categories::where('status','active')->orderBy('category_order','ASC')->get() as $category)
                        @if(count(\App\Products::where('category_id','=', $category->id)->get()) > 0)
                            <option value="{{$category->category_slug}}">{{$category->category_name}} ({{count(\App\Products::where('category_id','=', $category->id)->get())}})</option>
                        @endif
                    @endforeach
                </select>
                </span>&nbsp;
                <input type="text" class="form-control rounded" name="searchterm" placeholder="Search">&nbsp;
                <span class="input-group-btn">
                    <button class="rounded-right btn btn-warning" type="submit">GO!</button>
                </span>
            </div>
        </form>
        </div>