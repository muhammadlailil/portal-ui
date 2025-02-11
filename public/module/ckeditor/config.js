/**
 * @license Copyright (c) 2003-2025, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
CKEDITOR.editorConfig = function (config) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.disableVersionCheck = true;
	config.versionCheck = false;
	config.clipboard_handleImages = false;
	config.extraPlugins =  "uploadimage,image2";
	config.removePlugins = "image,exportpdf";
};
