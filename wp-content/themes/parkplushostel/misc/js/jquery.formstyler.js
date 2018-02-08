(function($) {
	$.fn.styler = function(opt) {

		var opt = $.extend({
			idSuffix: '-styler',
			browseText: 'Обзор...',
			selectVisibleOptions: 0,
			singleSelectzIndex: '100',
			selectSmartPositioning: true
		}, opt);

		return this.each(function() {
			var el = $(this);
			var id = '',
					cl = '',
					dataList = '';
			if (el.attr('id') !== undefined && el.attr('id') != '') id = ' id="' + el.attr('id') + opt.idSuffix + '"';
			if (el.attr('class') !== undefined && el.attr('class') != '') cl = ' ' + el.attr('class');
			var data = el.data();
			for (var i in data) {
				if (data[i] != '') dataList += ' data-' + i + '="' + data[i] + '"';
			}
			id += dataList;

		if (el.is('select')) {
				el.each(function() {
					if (el.next('span.jqselect').length < 1) {
						function selectbox() {
							// запрещаем прокрутку страницы при прокрутке селекта
							function preventScrolling(selector) {
								selector.unbind('mousewheel DOMMouseScroll').bind('mousewheel DOMMouseScroll', function(e) {
									var scrollTo = null;
									if (e.type == 'mousewheel') { scrollTo = (e.originalEvent.wheelDelta * -1); }
									else if (e.type == 'DOMMouseScroll') { scrollTo = 40 * e.originalEvent.detail; }
									if (scrollTo) { e.preventDefault(); $(this).scrollTop(scrollTo + $(this).scrollTop()); }
								});
							}
							var option = $('option', el);
							var list = '';
							// формируем список селекта
							function makeList() {
								for (i = 0, len = option.length; i < len; i++) {
									var li = '',
											liClass = '',
											optionClass = '',
											optgroupClass = '';
									var disabled = 'disabled';
									var selDis = 'selected sel disabled';
									if (option.eq(i).prop('selected')) liClass = 'selected sel';
									if (option.eq(i).is(':disabled')) liClass = disabled;
									if (option.eq(i).is(':selected:disabled')) liClass = selDis;
									if (option.eq(i).attr('class') !== undefined) optionClass = ' ' + option.eq(i).attr('class');
									li = '<li class="' + liClass + optionClass + '">'+ option.eq(i).text() +'</li>';
									// если есть optgroup
									if (option.eq(i).parent().is('optgroup')) {
										if (option.eq(i).parent().attr('class') !== undefined) optgroupClass = ' ' + option.eq(i).parent().attr('class');
										li = '<li class="' + liClass + optionClass + ' option' + optgroupClass + '">'+ option.eq(i).text() +'</li>';
										if (option.eq(i).is(':first-child')) {
											li = '<li class="optgroup' + optgroupClass + '">' + option.eq(i).parent().attr('label') + '</li>' + li;
										}
									}
									list += li;
								}
							} // end makeList()
							// одиночный селект
							function doSelect() {
								var selectbox =
									$('<span' + id + ' class="jq-selectbox jqselect' + cl + '" style="display: inline-block; position: relative; z-index:' + opt.singleSelectzIndex + '">'+
											'<div class="jq-selectbox__select">'+
												'<div class="jq-selectbox__select-text"></div>'+
												'<div class="jq-selectbox__trigger"><div class="jq-selectbox__trigger-arrow"></div></div>'+
											'</div>'+
										'</span>');
								el.after(selectbox).css({position: 'absolute', left: -9999});
								var divSelect = $('div.jq-selectbox__select', selectbox);
								var divText = $('div.jq-selectbox__select-text', selectbox);
								var optionSelected = option.filter(':selected');

								// берем опцию по умолчанию
								if (optionSelected.length) {
									divText.text(optionSelected.text());
								} else {
									divText.text(option.first().text());
								}

								// если селект неактивный
								if (el.is(':disabled')) {
									selectbox.addClass('disabled');

								// если селект активный
								} else {
									makeList();
									var dropdown =
										$('<div class="jq-selectbox__dropdown" style="position: absolute; overflow: auto; overflow-x: hidden">'+
												'<ul style="list-style: none">' + list + '</ul>'+
											'</div>');
									selectbox.append(dropdown);
									var li = $('li', dropdown);
									if (li.filter('.selected').length < 1) li.first().addClass('selected sel');
									var selectHeight = selectbox.outerHeight();
									if (dropdown.css('left') == 'auto') dropdown.css({left: 0});
									if (dropdown.css('top') == 'auto') dropdown.css({top: selectHeight});
									var liHeight = li.outerHeight();
									var position = dropdown.css('top');
									dropdown.hide();

									// при клике на псевдоселекте
									divSelect.click(function() {
										el.focus();

										// умное позиционирование
										if (opt.selectSmartPositioning) {
											var win = $(window);
											var topOffset = selectbox.offset().top;
											var bottomOffset = win.height() - selectHeight - (topOffset - win.scrollTop());
											var visible = opt.selectVisibleOptions;
											var	minHeight = liHeight * 6;
											var	newHeight = liHeight * visible;
											if (visible > 0 && visible < 6) minHeight =  newHeight;
											// раскрытие вверх
											if (bottomOffset < 0 || bottomOffset < minHeight)	{
												dropdown.height('auto').css({top: 'auto', bottom: position});
												if (dropdown.outerHeight() > topOffset - win.scrollTop() - 20 ) {
													dropdown.height(Math.floor((topOffset - win.scrollTop() - 20) / liHeight) * liHeight);
													if (visible > 0 && visible < 6) {
														if (dropdown.height() > minHeight) dropdown.height(minHeight);
													} else if (visible > 6) {
														if (dropdown.height() > newHeight) dropdown.height(newHeight);
													}
												}
											// раскрытие вниз
											} else if (bottomOffset > minHeight) {
												dropdown.height('auto').css({bottom: 'auto', top: position});
												if (dropdown.outerHeight() > bottomOffset - 20 ) {
													dropdown.height(Math.floor((bottomOffset - 20) / liHeight) * liHeight);
													if (visible > 0 && visible < 6) {
														if (dropdown.height() > minHeight) dropdown.height(minHeight);
													} else if (visible > 6) {
														if (dropdown.height() > newHeight) dropdown.height(newHeight);
													}
												}
											}
										}

										$('span.jqselect').css({zIndex: (opt.singleSelectzIndex-1)}).removeClass('focused');
										selectbox.css({zIndex: opt.singleSelectzIndex});
										if (dropdown.is(':hidden')) {
											$('div.jq-selectbox__dropdown:visible').hide();
											dropdown.show();
											selectbox.addClass('opened');
										} else {
											dropdown.hide();
											selectbox.removeClass('opened');
										}

										// прокручиваем до выбранного пункта при открытии списка
										if (li.filter('.selected').length) {
											dropdown.scrollTop(dropdown.scrollTop() + li.filter('.selected').position().top - dropdown.innerHeight()/2 + liHeight/2);
										}

										preventScrolling(dropdown);
										return false;
									});

									// при наведении курсора на пункт списка
									li.hover(function() {
										$(this).siblings().removeClass('selected');
									});
									var selectedText = li.filter('.selected').text();

									// при клике на пункт списка
									li.filter(':not(.disabled):not(.optgroup)').click(function() {
										var t = $(this);
										var liText = t.text();
										if (selectedText != liText) {
											var index = t.index();
											if (t.is('.option')) index -= t.prevAll('.optgroup').length;
											t.addClass('selected sel').siblings().removeClass('selected sel');
											option.prop('selected', false).eq(index).prop('selected', true);
											selectedText = liText;
											divText.text(liText);
											el.change();
										}
										dropdown.hide();
									});
									dropdown.mouseout(function() {
										$('li.sel', dropdown).addClass('selected');
									});

									// изменение селекта
									el.change(function() {
										divText.text(option.filter(':selected').text());
										li.removeClass('selected sel').not('.optgroup').eq(el[0].selectedIndex).addClass('selected sel');
									})
									.focus(function() {
										selectbox.addClass('focused');
									})
									.blur(function() {
										selectbox.removeClass('focused');
									})
									// прокрутки списка с клавиатуры
									.bind('keydown keyup', function(e) {
										divText.text(option.filter(':selected').text());
										li.removeClass('selected sel').not('.optgroup').eq(el[0].selectedIndex).addClass('selected sel');
										// вверх, влево, PageUp
										if (e.which == 38 || e.which == 37 || e.which == 33) {
											dropdown.scrollTop(dropdown.scrollTop() + li.filter('.selected').position().top);
										}
										// вниз, вправо, PageDown
										if (e.which == 40 || e.which == 39 || e.which == 34) {
											dropdown.scrollTop(dropdown.scrollTop() + li.filter('.selected').position().top - dropdown.innerHeight() + liHeight);
										}
										if (e.which == 13) {
											dropdown.hide();
										}
									});

									// прячем выпадающий список при клике за пределами селекта
									$(document).on('click', function(e) {
										// e.target.nodeName != 'OPTION' - добавлено для обхода бага в Опере
										// (при изменении селекта с клавиатуры срабатывает событие onclick)
										if (!$(e.target).parents().hasClass('selectbox') && e.target.nodeName != 'OPTION') {
											dropdown.hide().find('li.sel').addClass('selected');
											selectbox.removeClass('focused opened');
										}
									});
								}
							} // end doSelect()
							if (el.is('[multiple]')) doMultipleSelect(); else doSelect();
						} // end selectbox()
						selectbox();
					}
				});
			}// end select
		});
	}
})(jQuery);