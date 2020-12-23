const { __ } = wp.i18n; // Import __() from wp.i18n
const {
    registerBlockType,
} = wp.blocks; // Import from wp.blocks

const {
    PanelBody,
    PanelRow
} = wp.components;

const {
    Fragment
} = wp.element;

const {
    BlockControls,
    InspectorControls
} = wp.editor;


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

    registerBlockType(

        'yet-another-stars-rating/yasr-overall-rating', {
            title: __( 'Yasr: Overall Rating', 'yet-another-stars-rating' ),
            description: __('Insert the author rating', ''),
            icon: 'star-half',
            category: 'yet-another-stars-rating',
            keywords: [
                        __('rating', 'yet-another-stars-rating'),
                        __('author', 'yet-another-stars-rating'),
                        __('overall', 'yet-another-stars-rating')
                        ],
            attributes: {
                //name of the attribute
                size: {
                    type: 'string',
                    default: '--'
                },
                postId: {
                    type: 'int',
                    default: ''
                },
            },

            edit:

                function( props ) {

                    const { attributes: { size, postId }, setAttributes, isSelected } = props;

                    let sizeAttribute = null;
                    let postIdAttribute = null;

                    const chooseText = __('Choose stars size', 'yet-another-stars-rating');
                    const smallText = __('Small', 'yet-another-stars-rating');
                    const mediumText = __('Medium', 'yet-another-stars-rating');
                    const largeText = __('Large', 'yet-another-stars-rating');
                    const leaveThisBlankText = __('Leave this blank if you don\'t know what you\'re doing.', 'yet-another-stars-rating');

                    if (size !== '--') {
                        sizeAttribute = ' size="' + size + '"';
                    }

                    if (postId && !isNaN(postId)) {
                        postIdAttribute = ' postid="' +postId + '"';
                    }

                    function setPostId (event) {
                        if (event.key === 'Enter') {
                            const postIdValue = event.target.value;

                            //postID is always a string, here I check if this string is made only by digits
                            if (!isNaN(postIdValue)) {
                                setAttributes({postId: postIdValue})
                            }
                            event.preventDefault();
                        }

                    }

                    function printSelectSize () {
                        return (
                            <form onSubmit={ setSize }>
                                <select value={ size } onChange={ setSize }>
                                    <option value="--">{chooseText}</option>
                                    <option value="small">{smallText}</option>
                                    <option value="medium">{mediumText}</option>
                                    <option value="large">{largeText}</option>
                                </select>
                            </form>
                        );
                    }

                    function setSize( event ) {
                        const selected = event.target.querySelector( 'option:checked' );
                        setAttributes( { size: selected.value } );
                        event.preventDefault();
                    }

                    function printInputId() {
                        return (
                            <div>
                                <input type="text" size="4" onKeyPress={setPostId} />
                            </div>
                        );
                    }

                    function divForVoteOverall () {

                        const overallRateThis = __("Rate this article / item", 'yet-another-stars-rating');
                        const yasrLoading = __("Loading, please wait",'yet-another-stars-rating');
                        const hideLoaderOverall = {display: 'none'};

                        const currentPostId = wp.data.select("core/editor").getCurrentPostId();

                        return(

                            <div id="yasr-vote-overall-stars">

                                <span id="yasr-rateit-vote-overall-text">
                                    {overallRateThis}
                                </span>

                                <div id="yasr-rater-overall" ref={(elem)=>(yasrPrintEventSendOverallWithStars(currentPostId, yasrConstantGutenberg.nonceOverall, yasrConstantGutenberg.overallRating))}>

                                </div>

                                <div id="loader-overall-rating" style={hideLoaderOverall}>
                                    {yasrLoading} <img src={yasrCommonDataAdmin.loaderHtml} />
                                </div>

                                <div>
                                    <span id="yasr_rateit_overall_value" />
                                </div>

                            </div>

                        );

                    }

                    function printRightPanel () {

                        const optionalText = __('All these settings are optional', 'yet-another-stars-rating');
                        const labelSize = __('Choose Size', 'yet-another-stars-rating');
                        const labelPostID =__('PostId', 'yet-another-stars-rating');
                        const overallDescription = __('Remember: only the post author can rate here', 'yet-another-stars-rating');

                        return (
                            <InspectorControls>
                                <div className="yasr-guten-block-panel yasr-guten-block-panel-center">
                                    {divForVoteOverall()}
                                </div>

                                <PanelBody title='Settings'>
                                    <h3>{optionalText}</h3>

                                    <div className="yasr-guten-block-panel">
                                        <label>{labelSize}</label>
                                        <div>
                                            {printSelectSize()}
                                        </div>
                                    </div>

                                    <div className="yasr-guten-block-panel">
                                        <label>{labelPostID}</label>
                                        {printInputId()}
                                        <div className="yasr-guten-block-explain">
                                            {leaveThisBlankText}
                                        </div>
                                    </div>

                                    <div className="yasr-guten-block-panel">
                                        {overallDescription}
                                    </div>
                                </PanelBody>
                            </InspectorControls>
                        );

                    }

                    return (
                        <Fragment>
                        {printRightPanel ()}

                            <div className={ props.className }>
                                [yasr_overall_rating{sizeAttribute}{postIdAttribute}]
                                { isSelected && printSelectSize() }
                            </div>
                        </Fragment>
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
            save:
                function( props ) {
                    const { attributes: { size, postId } } = props;

                    let yasrOverallAttributes = null;

                    if (size) {
                        yasrOverallAttributes += ' size="' +size+ '"';
                    }
                    if (postId) {
                        yasrOverallAttributes += ' postid="'+postId+'"';
                    }

                    return (
                        <p>[yasr_overall_rating {yasrOverallAttributes}]</p>
                    );
                },

        });