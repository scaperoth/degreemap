<?php

/**
 * The code here was derived from the Yii Bootstrap 3 module.
 * class BSHTML from http://bootstrap3.pascal-brewing.de/
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Fnd_HTML {

    const ID_PREFIX = 'yt';

    /**
     * @var boolean whether to close single tags. Defaults to true. Can be set to false for HTML5.
     * @since 1.1.13
     */
    public static $closeSingleTags = true;

    /**
     * @var boolean whether to render special attributes value. Defaults to true. Can be set to false for HTML5.
     * @since 1.1.13
     */
    public static $renderSpecialAttributesValue = true;

    /**
     * @var string the HTML code to be prepended to the required label.
     * @see label
     */
    public static $beforeRequiredLabel = '';

    /**
     * @var string the HTML code to be appended to the required label.
     * @see label
     */
    public static $afterRequiredLabel = ' <span class="required">*</span>';

    const CHARSET = 'UTF-8';

    /**
     * @var integer the counter for generating automatic input field names.
     */
    public static $count = 0;

//
// TYPOGRAPHY
// --------------------------------------------------

    const TEXT_ALIGN_LEFT = 'left';
    const TEXT_ALIGN_CENTER = 'center';
    const TEXT_ALIGN_RIGHT = 'right';
    const TEXT_COLOR_DEFAULT = '';
    const TEXT_COLOR_MUTED = 'muted';
    const TEXT_COLOR_PRIMARY = 'primary';
    const TEXT_COLOR_SUCCESS = 'success';
    const TEXT_COLOR_INFO = 'info';
    const TEXT_COLOR_WARNING = 'warning';
    const TEXT_COLOR_DANGER = 'danger';
    const TEXT_ABBR_INITIALISM = 'initialism';
    const HELP_TYPE_INLINE = 'inline';
    const HELP_TYPE_BLOCK = 'block';
//
// FORM
// --------------------------------------------------
    const FORM_LAYOUT_VERTICAL = 'vertical';
    const FORM_LAYOUT_HORIZONTAL = 'horizontal';
    const FORM_LAYOUT_INLINE = 'inline';
    const FORM_LAYOUT_SEARCH = 'search';
    const FORM_LAYOUT_HORIZONTAL_LABEL_CLASS = 'col-lg-2';
    const FORM_LAYOUT_HORIZONTAL_CONTROL_CLASS = 'col-lg-10';
    const INPUT_TYPE_TEXT = 'textField';
    const INPUT_TYPE_PASSWORD = 'passwordField';
    const INPUT_TYPE_URL = 'urlField';
    const INPUT_TYPE_EMAIL = 'emailField';
    const INPUT_TYPE_TEL = 'telField';
    const INPUT_TYPE_NUMBER = 'numberField';
    const INPUT_TYPE_RANGE = 'rangeField';
    const INPUT_TYPE_DATE = 'dateField';
    const INPUT_TYPE_TEXTAREA = 'textArea';
    const INPUT_TYPE_FILE = 'fileField';
    const INPUT_TYPE_RADIOBUTTON = 'radioButton';
    const INPUT_TYPE_CHECKBOX = 'checkBox';
    const INPUT_TYPE_DROPDOWNLIST = 'dropDownList';
    const INPUT_TYPE_LISTBOX = 'listBox';
    const INPUT_TYPE_CHECKBOXLIST = 'checkBoxList';
    const INPUT_TYPE_INLINECHECKBOXLIST = 'inlineCheckBoxList';
    const INPUT_TYPE_RADIOBUTTONLIST = 'radioButtonList';
    const INPUT_TYPE_INLINERADIOBUTTONLIST = 'inlineRadioButtonList';
    const INPUT_TYPE_UNEDITABLE = 'uneditableField';
    const INPUT_TYPE_SEARCH = 'searchQuery';
    const INPUT_TYPE_CUSTOM = 'widget';
    const INPUT_SIZE_LG = 'input-lg';
    const INPUT_SIZE_SM = 'input-sm';
    const INPUT_SIZE_MINI = 'mini';
    const INPUT_SIZE_SMALL = 'small';
    const INPUT_SIZE_DEFAULT = '';
    const INPUT_SIZE_MEDIUM = 'medium';
    const INPUT_SIZE_LARGE = 'large';
    const INPUT_SIZE_XLARGE = 'xlarge';
    const INPUT_SIZE_XXLARGE = 'xxlarge';
    const INPUT_COLOR_DEFAULT = '';
    const INPUT_COLOR_WARNING = 'warning';
    const INPUT_COLOR_ERROR = 'error';
    const INPUT_COLOR_INFO = 'info';
    const INPUT_COLOR_SUCCESS = 'success';
//
// BUTTONS
// --------------------------------------------------
    const BUTTON_TYPE_LINK = 'link';
    const BUTTON_TYPE_HTML = 'htmlButton';
    const BUTTON_TYPE_SUBMIT = 'submitButton';
    const BUTTON_TYPE_RESET = 'resetButton';
    const BUTTON_TYPE_IMAGE = 'imageButton';
    const BUTTON_TYPE_LINKBUTTON = 'linkButton';
    const BUTTON_TYPE_NAVBARBUTTON = 'navbutton';
    const BUTTON_TYPE_AJAXLINK = 'ajaxLink';
    const BUTTON_TYPE_AJAXBUTTON = 'ajaxButton';
    const BUTTON_TYPE_INPUTBUTTON = 'inputButton';
    const BUTTON_TYPE_INPUTSUBMIT = 'inputSubmit';
    const BUTTON_COLOR_DEFAULT = 'default';
    const BUTTON_COLOR_PRIMARY = 'primary';
    const BUTTON_COLOR_INFO = 'info';
    const BUTTON_COLOR_SUCCESS = 'success';
    const BUTTON_COLOR_WARNING = 'warning';
    const BUTTON_COLOR_DANGER = 'danger';
    const BUTTON_COLOR_LINK = 'link';
    const BUTTON_SIZE_MINI = 'xs';
    const BUTTON_SIZE_SMALL = 'sm';
    const BUTTON_SIZE_DEFAULT = '';
    const BUTTON_SIZE_LARGE = 'lg';
    const BUTTON_TOGGLE_CHECKBOX = 'checkbox';
    const BUTTON_TOGGLE_RADIO = 'radio';
//
// IMAGES
// --------------------------------------------------
    const IMAGE_TYPE_ROUNDED = 'rounded';
    const IMAGE_TYPE_CIRCLE = 'circle';
    const IMAGE_TYPE_THUMBNAIL = 'thumbnail';
    const IMAGE_TYPE_RESPONSIVE = 'responsive';
//
// NAV
// --------------------------------------------------
    const NAV_TYPE_NONE = '';
    const NAV_TYPE_TABS = 'tabs';
    const NAV_TYPE_PILLS = 'pills';
    const NAV_TYPE_LIST = 'list';
    const NAV_TYPE_NAVBAR = 'navbar';
    const TABS_PLACEMENT_ABOVE = '';
    const TABS_PLACEMENT_BELOW = 'below';
    const TABS_PLACEMENT_LEFT = 'left';
    const TABS_PLACEMENT_RIGHT = 'right';
//
// NAVBAR
// --------------------------------------------------
    const NAVBAR_POSITION = '';
    const NAVBAR_POSITION_FIXED_TOP = 'fixed-top';
    const NAVBAR_POSITION_FIXED_BOTTOM = 'fixed-bottom';
    const NAVBAR_POSITION_STATIC_TOP = 'static-top';
    const NAVBAR_COLOR = 'default';
    const NAVBAR_COLOR_INVERSE = 'inverse';
//
// PAGINATION
// --------------------------------------------------
    const PAGINATION_SIZE_SMALL = 'sm';
    const PAGINATION_SIZE_DEFAULT = '';
    const PAGINATION_SIZE_LARGE = 'lg';
    const PAGINATION_ALIGN_LEFT = 'left';
    const PAGINATION_ALIGN_CENTER = 'centered';
    const PAGINATION_ALIGN_RIGHT = 'right';
//
// LABELS AND BADGES
// --------------------------------------------------
    const LABEL_COLOR_PRIMARY = 'primary';
    const LABEL_COLOR_SUCCESS = 'success';
    const LABEL_COLOR_WARNING = 'warning';
    const LABEL_COLOR_IMPORTANT = 'important';
    const LABEL_COLOR_INFO = 'info';
    const LABEL_COLOR_DANGER = 'danger';
//
// TOOLTIPS AND POPOVERS
// --------------------------------------------------
    const TOOLTIP_PLACEMENT_TOP = 'top';
    const TOOLTIP_PLACEMENT_BOTTOM = 'bottom';
    const TOOLTIP_PLACEMENT_LEFT = 'left';
    const TOOLTIP_PLACEMENT_RIGHT = 'right';
    const TOOLTIP_TRIGGER_CLICK = 'click';
    const TOOLTIP_TRIGGER_HOVER = 'hover';
    const TOOLTIP_TRIGGER_FOCUS = 'focus';
    const TOOLTIP_TRIGGER_MANUAL = 'manual';
    const POPOVER_PLACEMENT_TOP = 'top';
    const POPOVER_PLACEMENT_BOTTOM = 'bottom';
    const POPOVER_PLACEMENT_LEFT = 'left';
    const POPOVER_PLACEMENT_RIGHT = 'right';
    const POPOVER_TRIGGER_CLICK = 'click';
    const POPOVER_TRIGGER_HOVER = 'hover';
    const POPOVER_TRIGGER_FOCUS = 'focus';
    const POPOVER_TRIGGER_MANUAL = 'manual';
//
// ALERT
// --------------------------------------------------
    const ALERT_COLOR_DEFAULT = '';
    const ALERT_COLOR_INFO = 'info';
    const ALERT_COLOR_SUCCESS = 'success';
    const ALERT_COLOR_WARNING = 'warning';
    const ALERT_COLOR_ERROR = 'danger';
    const ALERT_COLOR_DANGER = 'danger';
//
// PROGRESS BARS
// --------------------------------------------------
    const PROGRESS_COLOR_INFO = 'info';
    const PROGRESS_COLOR_SUCCESS = 'success';
    const PROGRESS_COLOR_WARNING = 'warning';
    const PROGRESS_COLOR_DANGER = 'danger';
//
// MISC
// --------------------------------------------------
    const WELL_SIZE_SMALL = 'sm';
    const WELL_SIZE_LARGE = 'lg';
    const PULL_LEFT = 'left';
    const PULL_RIGHT = 'right';
    const CLOSE_DISMISS_ALERT = 'alert';
    const CLOSE_DISMISS_MODAL = 'modal';
//
// DETAIL VIEW
// --------------------------------------------------
    const DETAIL_TYPE_STRIPED = 'striped';
    const DETAIL_TYPE_BORDERED = 'bordered';
    const DETAIL_TYPE_CONDENSED = 'condensed';
    const DETAIL_TYPE_HOVER = 'hover';
//
// GRID VIEW
// --------------------------------------------------
    const GRID_TYPE_STRIPED = 'striped';
    const GRID_TYPE_BORDERED = 'bordered';
    const GRID_TYPE_CONDENSED = 'condensed';
    const GRID_TYPE_HOVER = 'hover';
    const GRID_TYPE_RESPONSIVE = 'responsive';
    const GRID_TYPE_COLUMN_SUCCESS = 'success';
    const GRID_TYPE_COLUMN_ACTIVE = 'active';
    const GRID_TYPE_COLUMN_WARNING = 'warning';
    const GRID_TYPE_COLUMN_DANGER = 'danger';
//
// AFFIX
// --------------------------------------------------
    const AFFIX_POSITION_TOP = 'top';
    const AFFIX_POSITION_BOTTOM = 'bottom';
//
// ICON
// --------------------------------------------------
    const GLYPHICON_ADJUST = 'glyphicon-adjust';
    const GLYPHICON_ALIGN_CENTER = 'glyphicon-align-center';
    const GLYPHICON_ALIGN_JUSTIFY = 'glyphicon-align-justify';
    const GLYPHICON_ALIGN_LEFT = 'glyphicon-align-left';
    const GLYPHICON_ALIGN_RIGHT = 'glyphicon-align-right';
    const GLYPHICON_ARROW_DOWN = 'glyphicon-arrow-down';
    const GLYPHICON_ARROW_LEFT = 'glyphicon-arrow-left';
    const GLYPHICON_ARROW_RIGHT = 'glyphicon-arrow-right';
    const GLYPHICON_ARROW_UP = 'glyphicon-arrow-up';
    const GLYPHICON_ASTERISK = 'glyphicon-asterisk';
    const GLYPHICON_BACKWARD = 'glyphicon-backward';
    const GLYPHICON_BAN_CIRCLE = 'glyphicon-ban-circle';
    const GLYPHICON_BARCODE = 'glyphicon-barcode';
    const GLYPHICON_BELL = 'glyphicon-bell';
    const GLYPHICON_BOLD = 'glyphicon-bold';
    const GLYPHICON_BOOK = 'glyphicon-book';
    const GLYPHICON_BOOKMARK = 'glyphicon-bookmark';
    const GLYPHICON_BRIEFCASE = 'glyphicon-briefcase';
    const GLYPHICON_BULLHORN = 'glyphicon-bullhorn';
    const GLYPHICON_CALENDAR = 'glyphicon-calendar';
    const GLYPHICON_CAMERA = 'glyphicon-camera';
    const GLYPHICON_CERTIFICATE = 'glyphicon-certificate';
    const GLYPHICON_CHECK = 'glyphicon-check';
    const GLYPHICON_CHEVRON_DOWN = 'glyphicon-chevron-down';
    const GLYPHICON_CHEVRON_LEFT = 'glyphicon-chevron-left';
    const GLYPHICON_CHEVRON_RIGHT = 'glyphicon-chevron-right';
    const GLYPHICON_CHEVRON_UP = 'glyphicon-chevron-up';
    const GLYPHICON_CIRCLE_ARROW_DOWN = 'glyphicon-circle-arrow-down';
    const GLYPHICON_CIRCLE_ARROW_LEFT = 'glyphicon-circle-arrow-left';
    const GLYPHICON_CIRCLE_ARROW_RIGHT = 'glyphicon-circle-arrow-right';
    const GLYPHICON_CIRCLE_ARROW_UP = 'glyphicon-circle-arrow-up';
    const GLYPHICON_CLOUD = 'glyphicon-cloud';
    const GLYPHICON_CLOUD_DOWNLOAD = 'glyphicon-cloud-download';
    const GLYPHICON_CLOUD_UPLOAD = 'glyphicon-cloud-upload';
    const GLYPHICON_COG = 'glyphicon-cog';
    const GLYPHICON_COLLAPSE_DOWN = 'glyphicon-collapse-down';
    const GLYPHICON_COLLAPSE_UP = 'glyphicon-collapse-up';
    const GLYPHICON_COMMENT = 'glyphicon-comment';
    const GLYPHICON_COMPRESSED = 'glyphicon-compressed';
    const GLYPHICON_COPYRIGHT_MARK = 'glyphicon-copyright-mark';
    const GLYPHICON_CREDIT_CARD = 'glyphicon-credit-card';
    const GLYPHICON_CUTLERY = 'glyphicon-cutlery';
    const GLYPHICON_DASHBOARD = 'glyphicon-dashboard';
    const GLYPHICON_DOWNLOAD = 'glyphicon-download';
    const GLYPHICON_DOWNLOAD_ALT = 'glyphicon-download-alt';
    const GLYPHICON_EARPHONE = 'glyphicon-earphone';
    const GLYPHICON_EDIT = 'glyphicon-edit';
    const GLYPHICON_EJECT = 'glyphicon-eject';
    const GLYPHICON_ENVELOPE = 'glyphicon-envelope';
    const GLYPHICON_EURO = 'glyphicon-euro';
    const GLYPHICON_EXCLAMATION_SIGN = 'glyphicon-exclamation-sign';
    const GLYPHICON_EXPAND = 'glyphicon-expand';
    const GLYPHICON_EXPORT = 'glyphicon-export';
    const GLYPHICON_EYE_CLOSE = 'glyphicon-eye-close';
    const GLYPHICON_EYE_OPEN = 'glyphicon-eye-open';
    const GLYPHICON_FACETIME_VIDEO = 'glyphicon-facetime-video';
    const GLYPHICON_FAST_BACKWARD = 'glyphicon-fast-backward';
    const GLYPHICON_FAST_FORWARD = 'glyphicon-fast-forward';
    const GLYPHICON_FILE = 'glyphicon-file';
    const GLYPHICON_FILM = 'glyphicon-film';
    const GLYPHICON_FILTER = 'glyphicon-filter';
    const GLYPHICON_FIRE = 'glyphicon-fire';
    const GLYPHICON_FLAG = 'glyphicon-flag';
    const GLYPHICON_FLASH = 'glyphicon-flash';
    const GLYPHICON_FLOPPY_DISK = 'glyphicon-floppy-disk';
    const GLYPHICON_FLOPPY_OPEN = 'glyphicon-floppy-open';
    const GLYPHICON_FLOPPY_REMOVE = 'glyphicon-floppy-remove';
    const GLYPHICON_FLOPPY_SAVE = 'glyphicon-floppy-save';
    const GLYPHICON_FLOPPY_SAVED = 'glyphicon-floppy-saved';
    const GLYPHICON_FOLDER_CLOSE = 'glyphicon-folder-close';
    const GLYPHICON_FOLDER_OPEN = 'glyphicon-folder-open';
    const GLYPHICON_FONT = 'glyphicon-font';
    const GLYPHICON_FORWARD = 'glyphicon-forward';
    const GLYPHICON_FULLSCREEN = 'glyphicon-fullscreen';
    const GLYPHICON_GBP = 'glyphicon-gbp';
    const GLYPHICON_GIFT = 'glyphicon-gift';
    const GLYPHICON_GLASS = 'glyphicon-glass';
    const GLYPHICON_GLOBE = 'glyphicon-globe';
    const GLYPHICON_HAND_DOWN = 'glyphicon-hand-down';
    const GLYPHICON_HAND_LEFT = 'glyphicon-hand-left';
    const GLYPHICON_HAND_RIGHT = 'glyphicon-hand-right';
    const GLYPHICON_HAND_UP = 'glyphicon-hand-up';
    const GLYPHICON_HD_VIDEO = 'glyphicon-hd-video';
    const GLYPHICON_HDD = 'glyphicon-hdd';
    const GLYPHICON_HEADER = 'glyphicon-header';
    const GLYPHICON_HEADPHONES = 'glyphicon-headphones';
    const GLYPHICON_HEART = 'glyphicon-heart';
    const GLYPHICON_HEART_EMPTY = 'glyphicon-heart-empty';
    const GLYPHICON_HOME = 'glyphicon-home';
    const GLYPHICON_IMPORT = 'glyphicon-import';
    const GLYPHICON_INBOX = 'glyphicon-inbox';
    const GLYPHICON_INDENT_LEFT = 'glyphicon-indent-left';
    const GLYPHICON_INDENT_RIGHT = 'glyphicon-indent-right';
    const GLYPHICON_INFO_SIGN = 'glyphicon-info-sign';
    const GLYPHICON_ITALIC = 'glyphicon-italic';
    const GLYPHICON_LEAF = 'glyphicon-leaf';
    const GLYPHICON_LINK = 'glyphicon-link';
    const GLYPHICON_LIST = 'glyphicon-list';
    const GLYPHICON_LIST_ALT = 'glyphicon-list-alt';
    const GLYPHICON_LOCK = 'glyphicon-lock';
    const GLYPHICON_LOG_IN = 'glyphicon-log-in';
    const GLYPHICON_LOG_OUT = 'glyphicon-log-out';
    const GLYPHICON_MAGNET = 'glyphicon-magnet';
    const GLYPHICON_MAP_MARKER = 'glyphicon-map-marker';
    const GLYPHICON_MINUS = 'glyphicon-minus';
    const GLYPHICON_MINUS_SIGN = 'glyphicon-minus-sign';
    const GLYPHICON_MOVE = 'glyphicon-move';
    const GLYPHICON_MUSIC = 'glyphicon-music';
    const GLYPHICON_NEW_WINDOW = 'glyphicon-new-window';
    const GLYPHICON_OFF = 'glyphicon-off';
    const GLYPHICON_OK = 'glyphicon-ok';
    const GLYPHICON_OK_CIRCLE = 'glyphicon-ok-circle';
    const GLYPHICON_OK_SIGN = 'glyphicon-ok-sign';
    const GLYPHICON_OPEN = 'glyphicon-open';
    const GLYPHICON_PAPERCLIP = 'glyphicon-paperclip';
    const GLYPHICON_PAUSE = 'glyphicon-pause';
    const GLYPHICON_PENCIL = 'glyphicon-pencil';
    const GLYPHICON_PHONE = 'glyphicon-phone';
    const GLYPHICON_PHONE_ALT = 'glyphicon-phone-alt';
    const GLYPHICON_PICTURE = 'glyphicon-picture';
    const GLYPHICON_PLANE = 'glyphicon-plane';
    const GLYPHICON_PLAY = 'glyphicon-play';
    const GLYPHICON_PLAY_CIRCLE = 'glyphicon-play-circle';
    const GLYPHICON_PLUS = 'glyphicon-plus';
    const GLYPHICON_PLUS_SIGN = 'glyphicon-plus-sign';
    const GLYPHICON_PRINT = 'glyphicon-print';
    const GLYPHICON_PUSHPIN = 'glyphicon-pushpin';
    const GLYPHICON_QRCODE = 'glyphicon-qrcode';
    const GLYPHICON_QUESTION_SIGN = 'glyphicon-question-sign';
    const GLYPHICON_RANDOM = 'glyphicon-random';
    const GLYPHICON_RECORD = 'glyphicon-record';
    const GLYPHICON_REFRESH = 'glyphicon-refresh';
    const GLYPHICON_REGISTRATION_MARK = 'glyphicon-registration-mark';
    const GLYPHICON_REMOVE = 'glyphicon-remove';
    const GLYPHICON_REMOVE_CIRCLE = 'glyphicon-remove-circle';
    const GLYPHICON_REMOVE_SIGN = 'glyphicon-remove-sign';
    const GLYPHICON_REPEAT = 'glyphicon-repeat';
    const GLYPHICON_RESIZE_FULL = 'glyphicon-resize-full';
    const GLYPHICON_RESIZE_HORIZONTAL = 'glyphicon-resize-horizontal';
    const GLYPHICON_RESIZE_SMALL = 'glyphicon-resize-small';
    const GLYPHICON_RESIZE_VERTICAL = 'glyphicon-resize-vertical';
    const GLYPHICON_RETWEET = 'glyphicon-retweet';
    const GLYPHICON_ROAD = 'glyphicon-road';
    const GLYPHICON_SAVE = 'glyphicon-save';
    const GLYPHICON_SAVED = 'glyphicon-saved';
    const GLYPHICON_SCREENSHOT = 'glyphicon-screenshot';
    const GLYPHICON_SD_VIDEO = 'glyphicon-sd-video';
    const GLYPHICON_SEARCH = 'glyphicon-search';
    const GLYPHICON_SEND = 'glyphicon-send';
    const GLYPHICON_SHARE = 'glyphicon-share';
    const GLYPHICON_SHARE_ALT = 'glyphicon-share-alt';
    const GLYPHICON_SHOPPING_CART = 'glyphicon-shopping-cart';
    const GLYPHICON_SIGNAL = 'glyphicon-signal';
    const GLYPHICON_SORT = 'glyphicon-sort';
    const GLYPHICON_SORT_BY_ALPHABET = 'glyphicon-sort-by-alphabet';
    const GLYPHICON_SORT_BY_ALPHABET_ALT = 'glyphicon-sort-by-alphabet-alt';
    const GLYPHICON_SORT_BY_ATTRIBUTES = 'glyphicon-sort-by-attributes';
    const GLYPHICON_SORT_BY_ATTRIBUTES_ALT = 'glyphicon-sort-by-attributes-alt';
    const GLYPHICON_SORT_BY_ORDER = 'glyphicon-sort-by-order';
    const GLYPHICON_SORT_BY_ORDER_ALT = 'glyphicon-sort-by-order-alt';
    const GLYPHICON_SOUND_5_1 = 'glyphicon-sound-5-1';
    const GLYPHICON_SOUND_6_1 = 'glyphicon-sound-6-1';
    const GLYPHICON_SOUND_7_1 = 'glyphicon-sound-7-1';
    const GLYPHICON_SOUND_DOLBY = 'glyphicon-sound-dolby';
    const GLYPHICON_SOUND_STEREO = 'glyphicon-sound-stereo';
    const GLYPHICON_STAR = 'glyphicon-star';
    const GLYPHICON_STAR_EMPTY = 'glyphicon-star-empty';
    const GLYPHICON_STATS = 'glyphicon-stats';
    const GLYPHICON_STEP_BACKWARD = 'glyphicon-step-backward';
    const GLYPHICON_STEP_FORWARD = 'glyphicon-step-forward';
    const GLYPHICON_STOP = 'glyphicon-stop';
    const GLYPHICON_SUBTITLES = 'glyphicon-subtitles';
    const GLYPHICON_TAG = 'glyphicon-tag';
    const GLYPHICON_TAGS = 'glyphicon-tags';
    const GLYPHICON_TASKS = 'glyphicon-tasks';
    const GLYPHICON_TEXT_HEIGHT = 'glyphicon-text-height';
    const GLYPHICON_TEXT_WIDTH = 'glyphicon-text-width';
    const GLYPHICON_TH = 'glyphicon-th';
    const GLYPHICON_TH_LARGE = 'glyphicon-th-large';
    const GLYPHICON_TH_LIST = 'glyphicon-th-list';
    const GLYPHICON_THUMBS_DOWN = 'glyphicon-thumbs-down';
    const GLYPHICON_THUMBS_UP = 'glyphicon-thumbs-up';
    const GLYPHICON_TIME = 'glyphicon-time';
    const GLYPHICON_TINT = 'glyphicon-tint';
    const GLYPHICON_TOWER = 'glyphicon-tower';
    const GLYPHICON_TRANSFER = 'glyphicon-transfer';
    const GLYPHICON_TRASH = 'glyphicon-trash';
    const GLYPHICON_TREE_CONIFER = 'glyphicon-tree-conifer';
    const GLYPHICON_TREE_DECIDUOUS = 'glyphicon-tree-deciduous';
    const GLYPHICON_UNCHECKED = 'glyphicon-unchecked';
    const GLYPHICON_UPLOAD = 'glyphicon-upload';
    const GLYPHICON_USD = 'glyphicon-usd';
    const GLYPHICON_USER = 'glyphicon-user';
    const GLYPHICON_VOLUME_DOWN = 'glyphicon-volume-down';
    const GLYPHICON_VOLUME_OFF = 'glyphicon-volume-off';
    const GLYPHICON_VOLUME_UP = 'glyphicon-volume-up';
    const GLYPHICON_WARNING_SIGN = 'glyphicon-warning-sign';
    const GLYPHICON_WRENCH = 'glyphicon-wrench';
    const GLYPHICON_ZOOM_IN = 'glyphicon-zoom-in';
    const GLYPHICON_ZOOM_OUT = 'glyphicon-zoom-out';
// Default close text.
    const CLOSE_TEXT = '&times;';
//
// ICON TYPOGRAPHY
// --------------------------------------------------
    const COLOR_PRIMARY = '#3276b1';
    const COLOR_DANGER = '#d9534f';
    const COLOR_WARNING = '#f0ad4e';
    const COLOR_SUCCESS = '#5cb85c';
    const COLOR_INFO = '#5bc0de';

    /**
     * @var string the CSS class for displaying error summaries.
     */
    public static $errorSummaryCss = 'alert alert-block alert-danger';

    /**
     * Generates a paragraph that stands out.
     * @param string $text the lead text.
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated paragraph.
     */
    public static function lead($text, $htmlOptions = array()) {
        self::addCssClass('lead', $htmlOptions);
        return self::tag('p', $htmlOptions, $text);
    }

    /**
     * Appends new class names to the given options..
     * @param mixed $className the class(es) to append.
     * @param array $htmlOptions the options.
     * @return array the options.
     */
    public static function addCssClass($className, &$htmlOptions) {
        if (is_array($className)) {
            $className = implode(' ', $className);
        }
        if (isset($htmlOptions['class'])) {
// todo: consider throwing an exception if the class exists instead of skipping the class.
            if (preg_match("/\b{$className}\b/", $htmlOptions['class']) === 0) {
                $htmlOptions['class'] .= ' ' . $className;
            }
        } else {
            $htmlOptions['class'] = $className;
        }
    }

    /**
     * Generates an HTML element.
     * @param string $tag the tag name.
     * @param array $htmlOptions the element attributes.
     * @param mixed $content the content to be enclosed between open and close element tags.
     * @param boolean $closeTag whether to generate the close tag.
     * @return string the generated HTML element tag.
     */
    public static function tag($tag, $htmlOptions = array(), $content = false, $closeTag = true) {
        self::addSpanClass($htmlOptions);
        self::addPullClass($htmlOptions);
        self::addTextAlignClass($htmlOptions);
        $html = '<' . $tag . self::renderAttributes($htmlOptions);
        if ($content === false)
            return $closeTag && self::$closeSingleTags ? $html . ' />' : $html . '>';
        else
            return $closeTag ? $html . '>' . $content . '</' . $tag . '>' : $html . '>' . $content;
    }

    /**
     * Adds the grid span class to the given options is applicable.
     * @param array $htmlOptions the HTML attributes.
     */
    protected static function addSpanClass($htmlOptions = array()) {
        $span = Fnd_Array::popValue('span', $htmlOptions);
        if (!empty($span)) {
            self::addCssClass('span' . $span, $htmlOptions);
        }
    }

    /**
     * Adds the pull class to the given options is applicable.
     * @param array $htmlOptions the HTML attributes.
     */
    protected static function addPullClass(&$htmlOptions) {
        $pull = Fnd_Array::popValue('pull', $htmlOptions);
        if (!empty($pull)) {
            self::addCssClass('pull-' . $pull, $htmlOptions);
        }
    }

    /**
     * Adds the text align class to the given options if applicable.
     * @param array $htmlOptions the HTML attributes.
     */
    protected static function addTextAlignClass(&$htmlOptions) {
        $align = Fnd_Array::popValue('textAlign', $htmlOptions);
        if (!empty($align)) {
            self::addCssClass('text-' . $align, $htmlOptions);
        }
    }

    /**
     * Generates a hyperlink tag.
     * @param string $text link body. It will NOT be HTML-encoded.
     * @param mixed $url a URL or an action route that can be used to create a URL.
     * @param array $htmlOptions additional HTML attributes.
     * @return string the generated hyperlink
     */
    public static function link($text, $url = '#', $htmlOptions = array()) {
        if ($url !== false) {
            $htmlOptions['href'] = self::normalizeUrl($url);
        }

        return self::tag('a', $htmlOptions, $text);
    }

    /**
     * Copyright (c) 2011 Niklas A. Femerstrand <niklas@flattr.com>
     *
     * Permission is hereby granted, free of charge, to any person obtaining a copy
     * of this software and associated documentation files (the "Software"), to deal
     * in the Software without restriction, including without limitation the rights
     * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
     * copies of the Software, and to permit persons to whom the Software is
     * furnished to do so, subject to the following conditions:
     *
     * The above copyright notice and this permission notice shall be included in
     * all copies or substantial portions of the Software.
     *
     * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
     * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
     * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
     * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
     * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
     * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
     * THE SOFTWARE.
     */
    function normalizeURL($url) {
        if ($url === '#')
            return $url;

        $newUrl = "";
        $url = parse_url($url);
        $defaultSchemes = array("http" => 80, "https" => 443);
        if (isset($url['scheme'])) {
            $url['scheme'] = strtolower($url['scheme']);
            // Strip scheme default ports
            if (isset($defaultSchemes[$url['scheme']]) && isset($url['port']) && $defaultSchemes[$url['scheme']] == $url['port'])
                unset($url['port']);
            $newUrl .= "{$url['scheme']}://";
        }
        if (isset($url['host'])) {
            $url['host'] = strtolower($url['host']);
            // Seems like a valid domain, properly validation should be made in higher layers.
            if (preg_match("/[a-z]+\Z/", $url['host'])) {
                if (preg_match("/^www\./", $url['host']) && gethostbyname($url['host']) == gethostbyname(str_replace("www.", "", $url['host'])))
                    $newUrl .= str_replace("www.", "", $url['host']);
                else
                    $newUrl .= $url['host'];
            } else
                $newUrl .= $url['host'];
        }
        if (isset($url['port']))
            $newUrl .= ":{$url['port']}";
        if (isset($url['path'])) {
            // Case normalization
            $url['path'] = preg_replace_callback('/(%([0-9abcdef][0-9abcdef]))/x', function ($m) {
                return "'%'.strtoupper({$m[2]})";
            }, $url['path']);
            //Strip duplicate slashes
            while (preg_match("/\/\//", $url['path']))
                $url['path'] = preg_replace("/\/\//", "/", $url['path']);
            /*
             * Decode unreserved characters, http://www.apps.ietf.org/rfc/rfc3986.html#sec-2.3
             * Heavily rewritten version of urlDecodeUnreservedChars() in Glen Scott's url-normalizer.
             */
            $u = array();
            for ($o = 65; $o <= 90; $o++)
                $u[] = dechex($o);
            for ($o = 97; $o <= 122; $o++)
                $u[] = dechex($o);
            for ($o = 48; $o <= 57; $o++)
                $u[] = dechex($o);
            $chrs = array('-', '.', '_', '~');
            foreach ($chrs as $chr)
                $u[] = dechex(ord($chr));
            $url['path'] = preg_replace_callback(array_map(create_function('$str', 'return "/%" . strtoupper($str) . "/x";'), $u), create_function('$matches', 'return chr(hexdec($matches[0]));'), $url['path']);
            // Remove directory index
            $defaultIndexes = array("/default\.aspx/" => "default.aspx", "/default\.asp/" => "default.asp",
                "/index\.html/" => "index.html", "/index\.htm/" => "index.htm",
                "/default\.html/" => "default.html", "/default\.htm/" => "default.htm",
                "/index\.php/" => "index.php", "/index\.jsp/" => "index.jsp");
            foreach ($defaultIndexes as $index => $strip) {
                if (preg_match($index, $url['path']))
                    $url['path'] = str_replace($strip, "", $url['path']);
            }

            /**
             * Path segment normalization, http://www.apps.ietf.org/rfc/rfc3986.html#sec-5.2.4
             * Heavily rewritten version of removeDotSegments() in Glen Scott's url-normalizer.
             */
            $new_path = '';
            while (!empty($url['path'])) {
                if (preg_match('!^(\.\./|\./)!x', $url['path']))
                    $url['path'] = preg_replace('!^(\.\./|\./)!x', '', $url['path']);
                elseif (preg_match('!^(/\./)!x', $url['path'], $matches) || preg_match('!^(/\.)$!x', $url['path'], $matches))
                    $url['path'] = preg_replace("!^" . $matches[1] . "!", '/', $url['path']);
                elseif (preg_match('!^(/\.\./|/\.\.)!x', $url['path'], $matches)) {
                    $url['path'] = preg_replace('!^' . preg_quote($matches[1], '!') . '!x', '/', $url['path']);
                    $new_path = preg_replace('!/([^/]+)$!x', '', $new_path);
                } elseif (preg_match('!^(\.|\.\.)$!x', $url['path']))
                    $url['path'] = preg_replace('!^(\.|\.\.)$!x', '', $url['path']);
                else {
                    if (preg_match('!(/*[^/]*)!x', $url['path'], $matches)) {
                        $first_path_segment = $matches[1];
                        $url['path'] = preg_replace('/^' . preg_quote($first_path_segment, '/') . '/', '', $url['path'], 1);
                        $new_path .= $first_path_segment;
                    }
                }
            }
            $newUrl .= $new_path;
        }

        if (isset($url['fragment']))
            unset($url['fragment']);

        // Sort GET params alphabetically, not because the RFC requires it but because it's cool!
        if (isset($url['query'])) {
            if (preg_match("/&/", $url['query'])) {
                $s = explode("&", $url['query']);
                $url['query'] = "";
                sort($s);
                foreach ($s as $z)
                    $url['query'] .= "{$z}&";
                $url['query'] = preg_replace("/&\Z/", "", $url['query']);
            }
            $newUrl .= "?{$url['query']}";
        }
        return $newUrl;
    }

    /**
     * Renders the HTML tag attributes.
     * Since version 1.1.5, attributes whose value is null will not be rendered.
     * Special attributes, such as 'checked', 'disabled', 'readonly', will be rendered
     * properly based on their corresponding boolean value.
     * @param array $htmlOptions attributes to be rendered
     * @return string the rendering result
     */
    public static function renderAttributes($htmlOptions) {
        static $specialAttributes = array(
            'async' => 1,
            'autofocus' => 1,
            'autoplay' => 1,
            'checked' => 1,
            'controls' => 1,
            'declare' => 1,
            'default' => 1,
            'defer' => 1,
            'disabled' => 1,
            'formnovalidate' => 1,
            'hidden' => 1,
            'ismap' => 1,
            'loop' => 1,
            'multiple' => 1,
            'muted' => 1,
            'nohref' => 1,
            'noresize' => 1,
            'novalidate' => 1,
            'open' => 1,
            'readonly' => 1,
            'required' => 1,
            'reversed' => 1,
            'scoped' => 1,
            'seamless' => 1,
            'selected' => 1,
            'typemustmatch' => 1,
        );

        if ($htmlOptions === array())
            return '';

        $html = '';
        if (isset($htmlOptions['encode'])) {
            $raw = !$htmlOptions['encode'];
            unset($htmlOptions['encode']);
        } else
            $raw = false;

        foreach ($htmlOptions as $name => $value) {
            if (isset($specialAttributes[$name])) {
                if ($value) {
                    $html .= ' ' . $name;
                    if (self::$renderSpecialAttributesValue)
                        $html .= '="' . $name . '"';
                }
            }
            elseif ($value !== null)
                $html .= ' ' . $name . '="' . ($raw ? $value : self::encode($value)) . '"';
        }

        return $html;
    }

    /**
     * Encodes special characters into HTML entities.
     * The {@link CApplication::charset application charset} will be used for encoding.
     * @param string $text data to be encoded
     * @return string the encoded data
     * @see http://www.php.net/manual/en/function.htmlspecialchars.php
     */
    public static function encode($text) {
        return htmlspecialchars($text, ENT_QUOTES, self::CHARSET);
    }

    /**
     * Generates an open HTML element.
     * @param string $tag the tag name.
     * @param array $htmlOptions the element attributes.
     * @return string the generated HTML element tag.
     */
    public static function openTag($tag, $htmlOptions = array()) {
        return self::tag($tag, $htmlOptions, false, false);
    }


}

/* End of file Fnd_HTML.php */