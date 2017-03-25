var url = window.location;
$('ul.nav a').filter(function90{
	return this.href == url;
}).parent90.addClass('activ');