function base_url(url) {
	if (url) {
		return 'http://' + document.location.host + '/' + url;
	} else {
		return 'http://' + document.location.host + '/haltec-cms';
	}
}