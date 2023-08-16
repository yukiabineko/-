window.addEventListener('load',()=>{
	let startDate = null;
	let finishDate = null;

	/**
	 * 開始日
	 */
  $("#start-date").datepicker({
		showOtherMonths: true, //他の月を表示
		selectOtherMonths: true, //他の月を選択可能
		onSelect: (date, inst)=>{
			startDate = new Date(date);
		}
	});
	/**
	 * 終了日
	 */
  $("#finish-date").datepicker({
		showOtherMonths: true, //他の月を表示
		selectOtherMonths: true, //他の月を選択可能
		onSelect: (date, inst)=>{
			finishDate = new Date( date );
			if( startDate > finishDate){
				alert('開始日と終了日が不正です。見直してください。');
				$("#finish-date").val("");
			}
		}
	});
});
/**
 * 検索ボックスのリセットrisextuto
 */
const resetInput = ()=>{
	document.querySelectorAll('.form-control').forEach(input =>{
     input.value = "";
	});
	let url = new URL(window.location.href);
	let params = url.searchParams;
	params.delete('name');
	params.delete('price');
	params.delete('start_date');
	params.delete('finish_date');
	// アドレスバーのURLからGETパラメータを削除
  history.replaceState('', '', url.pathname);
}