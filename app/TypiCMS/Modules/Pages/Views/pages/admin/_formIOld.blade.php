@section('js')
    {{ HTML::script(asset('//tinymce.cachefly.net/4.0/tinymce.min.js')) }}
    {{ HTML::script(asset('js/form.js')) }}
@stop

<div class="row">

    @include('admin._buttons-form')

    {{ Form::hidden('id'); }}

    <div class="col-sm-6">

        @include('admin._tabs-lang')

        <div class="tab-content">

            @foreach ($locales as $lang)

            <div class="tab-pane fade @if ($locale == $lang)in active@endif" id="{{ $lang }}">
                <div class="form-group">
                    {{ Form::label($lang.'[title]', trans('validation.attributes.title')) }}
                    {{ Form::text($lang.'[title]', $model->$lang->title, array('autofocus' => 'autofocus', 'class' => 'input-lg form-control')) }}
                </div>
                <div class="form-group @if($errors->has($lang.'.slug'))has-error@endif">
                    {{ Form::label($lang.'[slug]', trans('validation.attributes.slug'), array('class' => 'control-label')) }}
                    <div class="input-group">
                        {{ Form::text($lang.'[slug]', $model->$lang->slug, array('class' => 'form-control')) }}
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-slug @if($errors->has($lang.'.slug'))btn-danger@endif" type="button">@lang('validation.attributes.generate')</button>
                        </span>
                    </div>
                    @if($errors->has($lang.'.slug'))
                    <span class="help-block">{{ $errors->first($lang.'.slug') }}</span>
                    @endif
                </div>

                @if($model->$lang->uri)
                <span class="text-muted">
                    {{ trans('validation.attributes.address') }}: {{ $model->$lang->uri }}
                </span>
                @endif
                {{ Form::hidden($lang.'[uri]') }}

                <div class="form-group">
                    <label class="checkbox">
                        {{ Form::checkbox($lang.'[status]', 1, $model->$lang->status) }} @lang('validation.attributes.online')
                    </label>
                </div>
                <div class="form-group">
                    {{ Form::label($lang.'[body]', trans('validation.attributes.body')) }}
                    {{ Form::textarea($lang.'[body]', $model->$lang->body, array('class' => 'editor form-control')) }}
                </div>

                {{-- Metadata --}}
                <div class="form-group">
                    {{ Form::label($lang.'[meta_title]', trans('validation.attributes.meta_title')) }}
                    {{ Form::text($lang.'[meta_title]', $model->$lang->meta_title, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label($lang.'[meta_keywords]', trans('validation.attributes.meta_keywords')) }}
                    {{ Form::text($lang.'[meta_keywords]', $model->$lang->meta_keywords, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label($lang.'[meta_description]', trans('validation.attributes.meta_description')) }}
                    {{ Form::text($lang.'[meta_description]', $model->$lang->meta_description, array('class' => 'form-control')) }}
                </div>
            </div>

            @endforeach

        </div>

    </div>

    <div class="col-sm-6">

        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#options" data-target="#options" data-toggle="tab">Options</a>
            </li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane fade in active" id="options">
                <div class="form-group">
                    <label class="checkbox">
                        {{ Form::checkbox('rss_enabled') }} @lang('validation.attributes.rss_enabled')
                    </label>
                </div>
                <div class="form-group">
                    <label class="checkbox">
                        {{ Form::checkbox('comments_enabled') }} @lang('validation.attributes.comments_enabled')
                    </label>
                </div>
                <div class="form-group">
                    @if ($model->is_home)
                        <label class="checkbox text-muted">
                            {{ Form::checkbox('is_home', null, null, array('disabled', 'disabled')) }} @lang('validation.attributes.is_home')
                            {{ Form::hidden('is_home') }}
                        </label>
                    @else
                        <label class="checkbox">
                            {{ Form::checkbox('is_home') }} @lang('validation.attributes.is_home')
                        </label>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('template', trans('validation.attributes.template')) }}
                    {{ Form::text('template', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('css', trans('validation.attributes.css')) }}
                    {{ Form::textarea('css', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('js', trans('validation.attributes.js')) }}
                    {{ Form::textarea('js', null, array('class' => 'form-control')) }}
                </div>
            </div>

        </div>

    </div>

</div>
