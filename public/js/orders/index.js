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
			let startInput = document.getElementById('start-date');
			alert(startDate);
			
			console.log(startInput);
		}
	});
});