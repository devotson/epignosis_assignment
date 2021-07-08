//
// block-header.js
//
const { registerBlockType } = wp.blocks

const {
    MediaUpload,
    RichText,
    InspectorControls
}  = wp.blockEditor

const {
    PanelBody,
    IconButton
} = wp.components

registerBlockType('assessment/header', {
    title       : 'Assessment - Header',
    category    : 'media',
    icon        : 'heading',
    description : 'Custom Header Block ',
    keywords    : [
        'header'
    ],

    // ..Set up data model for custom block
    attributes: {
        title: {
            type: 'string',
            source: 'html',
            selector: 'h2'
        },
        abovetitletxt: {
            type: 'string',
            source: 'html',
            selector: 'p'
        },
        backgroundImage: {
            type: 'string',
            default: null
        }
    },


    edit: ( props ) => {

        // ..Pull out the props we'll use
        const {
            attributes,
            setAttributes
        } = props

        // ..Pull out specific attributes for clarity below
        const {
            title,
            abovetitletxt,
            backgroundImage
        } = attributes

        // custom functions
        function onChangeTitle(newTitle) {
            setAttributes( { title: newTitle } );
        }

        function onChangeAbove(newText) {
            setAttributes( { abovetitletxt: newText } );
        }

        function onSelectImage(newImage) {
            setAttributes( { backgroundImage: newImage.sizes.full.url } );
        }

        return ([
            <InspectorControls style={ { marginBottom: '40px' } }>
                <PanelBody title={ 'Background Image Settings' }>
                    <p><strong>Select a Background Image:</strong></p>
                    <MediaUpload
                        onSelect={ onSelectImage }
                        type="image"
                        value={ backgroundImage }
                        render={ ( { open } ) => (
							<IconButton
								className="editor-media-placeholder__button is-button is-default is-large"
								icon="upload"
								onClick={ open }>
								 Background Image
							</IconButton>
                        )}
                    />
                </PanelBody>
            </InspectorControls>,
            <div class="header-wrapper" style={{
                backgroundImage: `url(${backgroundImage})`,
                backgroundSize: 'cover',
                backgroundPosition: 'center',
                backgroundRepeat: 'no-repeat'
            }}>
                <RichText key="editable"
                          tagName="p"
                          placeholder="Above Title Text"
                          value={ abovetitletxt }
                          onChange={ onChangeAbove }
                          />
                <RichText key="editable"
                          tagName="h2"
                          placeholder="Header Title"
                          value={ title }
                          onChange={ onChangeTitle }
                          />
            </div>
        ]);
    },

    save: ( props ) => {

        // ..Pull out the props we'll use
        const {
            attributes
        } = props

        // ..Pull out specific attributes for clarity below
        const {
            title,
            abovetitletxt,
            backgroundImage
        } = attributes

        return (
            <div class="header-wrapper" style={{
                backgroundImage: `url(${backgroundImage})`,
                backgroundSize: 'cover',
                backgroundPosition: 'center',
                backgroundRepeat: 'no-repeat'
            }}>                
                <RichText.Content tagName="p"
                                  value={ abovetitletxt }
                                  />
                <h2>{ title }</h2>
            </div>
        )
    }    
})