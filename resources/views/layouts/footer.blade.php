<footer>
    @if (Request::routeIs('daily_report.edit', 'daily_report.create'))
        <div>
            <a class="btn" id="back" href="{{ route('daily_report.index') }}">戻る</a>
        </div>
    @endif
</footer>