
<tr>
    <!-- ここに日付を挿入 -->
    <td class="py-2">田中太郎</td>
    @foreach ($chosenWeek as $day)
        <td class="py-2">{{ $day }}</td>    
    @endforeach
</tr>