<<<<<<< HEAD

<script type="text/javascript">

function validateform(){
	
	var description = document.forms["commentform"]["description"].value;
	var type = document.forms["commentform"]["commentType"].value;
	
	if(!isEmpty(description)){
		if(!isSelected(type)){
			return true;
		}
		else{
			return false;
		}
	}
	else{
		return false;
	}
	
}

function isEmpty(value)
{
	if(value == "" || value == null){
		alert("Please enter your comment in the description bar");
		return true;
	}
	else
	{
		return false;
	}
}

function isSelected(value)
{
	if(value == "" || value == null || value == "Choose your comment type")
	{
		alert("Please enter how you want your submission to be categorized");
		return true;
	}
	else
	{
		return false;
	}
}

</script>

=======

<script type="text/javascript">

function validateform(){
	
	var description = document.forms["commentform"]["description"].value;
	var type = document.forms["commentform"]["commentType"].value;
	
	if(!isEmpty(description)){
		if(!isSelected(type)){
			return true;
		}
		else{
			return false;
		}
	}
	else{
		return false;
	}
	
}

function isEmpty(value)
{
	if(value == "" || value == null){
		alert("Please enter your comment in the description bar");
		return true;
	}
	else
	{
		return false;
	}
}

function isSelected(value)
{
	if(value == "" || value == null || value == "Choose your comment type")
	{
		alert("Please enter how you want your submission to be categorized");
		return true;
	}
	else
	{
		return false;
	}
}

</script>

>>>>>>> d57608d56be1949eb28c6032b81c46cf51a7c686
