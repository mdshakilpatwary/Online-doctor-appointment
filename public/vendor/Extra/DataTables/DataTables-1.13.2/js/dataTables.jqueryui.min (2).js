/*! DataTables jQuery UI integration
 * ©2011-2014 SpryMedia Ltd - datatables.net/license
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery","datatables.net"],function(e){return a(e,window,document)}):"object"==typeof exports?module.exports=function(e,t){return e=e||window,(t=t||("undefined"!=typeof window?require("jquery"):require("jquery")(e))).fn.dataTable||require("datatables.net")(e,t),a(t,0,e.document)}:a(jQuery,window,document)}(function(e,t,a,u){"use strict";var i=e.fn.dataTable,n="fg-toolbar ui-toolbar ui-widget-header ui-helper-clearfix ui-corner-";return e.extend(!0,i.defaults,{dom:'<"'+n+'tl ui-corner-tr"lfr>t<"'+n+'bl ui-corner-br"ip>'}),e.extend(i.ext.classes,{sWrapper:"dataTables_wrapper dt-jqueryui",sPageButton:"fg-button ui-button ui-state-default",sPageButtonActive:"ui-state-disabled",sPageButtonDisabled:"ui-state-disabled",sPaging:"dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_",sScrollHead:"dataTables_scrollHead ui-state-default",sScrollFoot:"dataTables_scrollFoot ui-state-default",sHeaderTH:"ui-state-default",sFooterTH:"ui-state-default"}),i});