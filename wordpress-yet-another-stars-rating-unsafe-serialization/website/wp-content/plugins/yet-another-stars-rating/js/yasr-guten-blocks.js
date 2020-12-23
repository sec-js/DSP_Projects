var __ = wp.i18n.__; // Import __() from wp.i18n

var registerBlockType = wp.blocks.registerBlockType; // Import from wp.blocks

var _wp$components = wp.components,
    PanelBody = _wp$components.PanelBody,
    PanelRow = _wp$components.PanelRow;
var Fragment = wp.element.Fragment;
var _wp$editor = wp.editor,
    BlockControls = _wp$editor.BlockControls,
    InspectorControls = _wp$editor.InspectorControls;

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */

registerBlockType('yet-another-stars-rating/yasr-overall-rating', {
    title: __('Yasr: Overall Rating', 'yet-another-stars-rating'),
    description: __('Insert the author rating', ''),
    icon: 'star-half',
    category: 'yet-another-stars-rating',
    keywords: [__('rating', 'yet-another-stars-rating'), __('author', 'yet-another-stars-rating'), __('overall', 'yet-another-stars-rating')],
    attributes: {
        //name of the attribute
        size: {
            type: 'string',
            default: '--'
        },
        postId: {
            type: 'int',
            default: ''
        }
    },

    edit: function edit(props) {
        var _props$attributes = props.attributes,
            size = _props$attributes.size,
            postId = _props$attributes.postId,
            setAttributes = props.setAttributes,
            isSelected = props.isSelected;


        var sizeAttribute = null;
        var postIdAttribute = null;

        var chooseText = __('Choose stars size', 'yet-another-stars-rating');
        var smallText = __('Small', 'yet-another-stars-rating');
        var mediumText = __('Medium', 'yet-another-stars-rating');
        var largeText = __('Large', 'yet-another-stars-rating');
        var leaveThisBlankText = __('Leave this blank if you don\'t know what you\'re doing.', 'yet-another-stars-rating');

        if (size !== '--') {
            sizeAttribute = ' size="' + size + '"';
        }

        if (postId && !isNaN(postId)) {
            postIdAttribute = ' postid="' + postId + '"';
        }

        function setPostId(event) {
            if (event.key === 'Enter') {
                var postIdValue = event.target.value;

                //postID is always a string, here I check if this string is made only by digits
                if (!isNaN(postIdValue)) {
                    setAttributes({ postId: postIdValue });
                }
                event.preventDefault();
            }
        }

        function printSelectSize() {
            return React.createElement(
                'form',
                { onSubmit: setSize },
                React.createElement(
                    'select',
                    { value: size, onChange: setSize },
                    React.createElement(
                        'option',
                        { value: '--' },
                        chooseText
                    ),
                    React.createElement(
                        'option',
                        { value: 'small' },
                        smallText
                    ),
                    React.createElement(
                        'option',
                        { value: 'medium' },
                        mediumText
                    ),
                    React.createElement(
                        'option',
                        { value: 'large' },
                        largeText
                    )
                )
            );
        }

        function setSize(event) {
            var selected = event.target.querySelector('option:checked');
            setAttributes({ size: selected.value });
            event.preventDefault();
        }

        function printInputId() {
            return React.createElement(
                'div',
                null,
                React.createElement('input', { type: 'text', size: '4', onKeyPress: setPostId })
            );
        }

        function divForVoteOverall() {

            var overallRateThis = __("Rate this article / item", 'yet-another-stars-rating');
            var yasrLoading = __("Loading, please wait", 'yet-another-stars-rating');
            var hideLoaderOverall = { display: 'none' };

            var currentPostId = wp.data.select("core/editor").getCurrentPostId();

            return React.createElement(
                'div',
                { id: 'yasr-vote-overall-stars' },
                React.createElement(
                    'span',
                    { id: 'yasr-rateit-vote-overall-text' },
                    overallRateThis
                ),
                React.createElement('div', { id: 'yasr-rater-overall', ref: function ref(elem) {
                        return yasrPrintEventSendOverallWithStars(currentPostId, yasrConstantGutenberg.nonceOverall, yasrConstantGutenberg.overallRating);
                    } }),
                React.createElement(
                    'div',
                    { id: 'loader-overall-rating', style: hideLoaderOverall },
                    yasrLoading,
                    ' ',
                    React.createElement('img', { src: yasrCommonDataAdmin.loaderHtml })
                ),
                React.createElement(
                    'div',
                    null,
                    React.createElement('span', { id: 'yasr_rateit_overall_value' })
                )
            );
        }

        function printRightPanel() {

            var optionalText = __('All these settings are optional', 'yet-another-stars-rating');
            var labelSize = __('Choose Size', 'yet-another-stars-rating');
            var labelPostID = __('PostId', 'yet-another-stars-rating');
            var overallDescription = __('Remember: only the post author can rate here', 'yet-another-stars-rating');

            return React.createElement(
                InspectorControls,
                null,
                React.createElement(
                    'div',
                    { className: 'yasr-guten-block-panel yasr-guten-block-panel-center' },
                    divForVoteOverall()
                ),
                React.createElement(
                    PanelBody,
                    { title: 'Settings' },
                    React.createElement(
                        'h3',
                        null,
                        optionalText
                    ),
                    React.createElement(
                        'div',
                        { className: 'yasr-guten-block-panel' },
                        React.createElement(
                            'label',
                            null,
                            labelSize
                        ),
                        React.createElement(
                            'div',
                            null,
                            printSelectSize()
                        )
                    ),
                    React.createElement(
                        'div',
                        { className: 'yasr-guten-block-panel' },
                        React.createElement(
                            'label',
                            null,
                            labelPostID
                        ),
                        printInputId(),
                        React.createElement(
                            'div',
                            { className: 'yasr-guten-block-explain' },
                            leaveThisBlankText
                        )
                    ),
                    React.createElement(
                        'div',
                        { className: 'yasr-guten-block-panel' },
                        overallDescription
                    )
                )
            );
        }

        return React.createElement(
            Fragment,
            null,
            printRightPanel(),
            React.createElement(
                'div',
                { className: props.className },
                '[yasr_overall_rating',
                sizeAttribute,
                postIdAttribute,
                ']',
                isSelected && printSelectSize()
            )
        );
    },

    /**
     * The save function defines the way in which the different attributes should be combined
     * into the final markup, which is then serialized by Gutenberg into post_content.
     *
     * The "save" property must be specified and must be a valid function.
     *
     * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
     */
    save: function save(props) {
        var _props$attributes2 = props.attributes,
            size = _props$attributes2.size,
            postId = _props$attributes2.postId;


        var yasrOverallAttributes = null;

        if (size) {
            yasrOverallAttributes += ' size="' + size + '"';
        }
        if (postId) {
            yasrOverallAttributes += ' postid="' + postId + '"';
        }

        return React.createElement(
            'p',
            null,
            '[yasr_overall_rating ',
            yasrOverallAttributes,
            ']'
        );
    }

});