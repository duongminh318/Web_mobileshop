function checkall(class_name, obj) {
	//Duyệt qua các checkbox có class= item
	
	var items=document.getElementsByClassName(class_name);
	if(obj.checked == true)// Đã được chọn
	{
		for(i=0; i<items.length ; i++)
			items[i].checked = true;
	}
	else {
		for(i=0; i < items.length; i++)
			items[i].checked = false;
	}
}