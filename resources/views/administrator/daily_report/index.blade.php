@extends('layouts.administrator_parent')
@section('administrator_content')
    <main class="p-6">
        <div class="container mx-auto">
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <div class="flex justify-between mb-3">
                    <h1 class="text-2xl font-semibold mb-4">日報一覧</h1>
                    <div class="flex">
                        <a href="#" class="btn mr-3">前の週</a>
                        <a href="#" class="btn">次の週</a>
                    </div>
                </div>
                
                <!-- カレンダーの表を作成 -->
                <table class="table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="w-1/7"></th>
                            <th class="w-1/7">日</th>
                            <th class="w-1/7">月</th>
                            <th class="w-1/7">火</th>
                            <th class="w-1/7">水</th>
                            <th class="w-1/7">木</th>
                            <th class="w-1/7">金</th>
                            <th class="w-1/7">土</th>
                        </tr>
                    </thead>
                    <tbody id="weekly">
                    </tbody>
                </table>
            </div>
        </div>

        {{-- モーダル --}}
        {{-- <label for="hogehoge" class="btn btn-primary">開く</label> --}}
        <input type="checkbox" id="report_modal" class="modal-toggle">
        <div class="modal">
        <div class="modal-box">
            <h3 id="modal_report_detail_title" class="font-bold text-lg">タイトルです</h3>
            <p id="modal_report_detail_detail" class="py-4">内容です</p>
            <div class="modal-action">
            <label for="report_modal" class="btn">閉じる</label>
            </div>
        </div>
        </div>
    </main>
    
    <script>
        // 非同期POST通信用にトークンを作成
        const csrfToken = "{{ csrf_token() }}";

        // 画面に表示されているreport_detail_idの読み込み
        function loadReportDetailId () {
            const reportTitles = document.getElementsByClassName('report_title');
            const modalReportDetailTitle = document.getElementById('modal_report_detail_title');
            const modalReportDetailDetail = document.getElementById('modal_report_detail_detail');
            
            for (const reportTitle of reportTitles) {
                reportTitle.addEventListener('click', async (e) => {
                    const reportDetailId = e.target.dataset.report_detail_id; // カスタムデータ属性の名前に注意
                    // 非同期でクリックした日報のデータを取得
                    const response = await fetchReportDetail(reportDetailId);
                    // モーダル内に取得したデータを反映
                    modalReportDetailTitle.innerHTML = response.project_title;
                    modalReportDetailDetail.innerHTML = response.detail;
                });
            }
        }
        // 日報の内容を非同期で取得
        async function fetchReportDetail (reportDetailId) {
            const url = '/administrator/daily_report/show';
            const headers = {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken
            };
            const options = {
                method: 'POST',
                headers: headers,
                body: JSON.stringify({report_detail_id: reportDetailId})
            };
            const response = await fetch(url, options);
            const data = await response.json();
            return data;
        }
        
        function getStartOfWeek(date) {
            // 引数のdateオブジェクトが指定されない場合は、現在の日付を使用
            if (!date) {
                date = new Date();
            }

            // 今日の曜日を取得（0が日曜日、1が月曜日、...、6が土曜日）
            const currentDayOfWeek = date.getDay();

            // 週の初めを設定するための日数を計算
            const daysUntilStartOfWeek = (currentDayOfWeek + 7) % 7;

            // 週の初めの日付を計算
            const startOfWeek = new Date(date);
            startOfWeek.setDate(date.getDate() - daysUntilStartOfWeek);

            return startOfWeek;
        }

        function formatDateToYYYYMMDD(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            
            return `${year}/${month}/${day}`;
        }

        // 現在の週の初めの日付を取得
        const startOfWeek = getStartOfWeek();

        // 結果を表示
        console.log(startOfWeek);

        // startOfWeek.setDate(startOfWeek.getDate() + 1);
        console.log(formatDateToYYYYMMDD(startOfWeek));


        const weekly = document.getElementById('weekly');

        // 画面読み込み時に週間カレンダーを表示
        window.addEventListener('DOMContentLoaded', async ()=> {
            const params = new URLSearchParams();

            const date = formatDateToYYYYMMDD(startOfWeek);
            params.append('date', date);

            const url = `/administrator/daily_report/weekly_templete/?${params.toString()}`;
            const headers = {'X-Requested-With': 'XMLHttpRequest'};
            const options = {
                method: 'GET',
                headers: headers
            };
            const response = await fetch(url, options);
            // console.log(response);
            if (!response.ok) {
                alert("カレンダーの取得に失敗しました。");
                return;
            }
            const responseHtml = await response.json();
            // console.log(responseHtml);
            weekly.innerHTML = responseHtml.html;

            // 画面に表示されているレポートのIDをロード
            loadReportDetailId();
        });
    </script>
@endsection