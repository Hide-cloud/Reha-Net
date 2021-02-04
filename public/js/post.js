
 function delete_alert(e){
    if(!window.confirm('投稿してもよろしいですか？')){
       window.alert('キャンセルされました'); 
       return false;
    }
    document.deleteform.submit();
 };

 function edit_alert(e){
    if(!window.confirm('登録情報を変更してもよろしいですか？')){
       window.alert('キャンセルされました'); 
       return false;
    }
    document.deleteform.submit();
 };