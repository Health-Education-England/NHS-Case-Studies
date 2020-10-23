/**
 * Block dependencies
 */
// import icon from './icon';
import './style.scss';

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

const { 
    RichText,
    URLInputButton,
    InspectorControls
} = wp.blockEditor;

const { 
    Spinner,
    SelectControl,
    PanelBody,
    PanelRow,
    TextControl,
    Disabled
} = wp.components;

const {
    Fragment
} = wp.element;

const {
    select,
    withSelect
} = wp.data;

const { serverSideRender: ServerSideRender } = wp;

/**
 * Register block
 */
export default registerBlockType(
    'nhs-cs/casestudies',
    {
        title: __( 'Case Studies Cards', 'nhs_cs' ),
        description: __( 'How to use the RichText component for building your own editable blocks.', 'nhs_cs' ),
        category: 'common',
        icon: 'welcome-learn-more',  
        keywords: [
            __( 'Casestudies card nursing', 'nhs_cs' ),
        ],
        attributes: {
            tax: {
                type: 'string'
            },
            title: {
                type: 'string',
                default: __( 'Latest Case Studies', 'nhs_cs' )
            },
            backend: {
                type: 'boolean'
            },
            url: {
                type: 'string'
            },
            urlTxt: {
                type: 'string',
                default: __( 'View all Case Studies', 'nhs_cs' )
            }
        },
        edit: withSelect( ( select, ownProps ) => {

            let parent_query = {
                'parent'     : 0,
                'hide_empty' : false,
                'per_page'   : -1
            }

            return {
                taxonomies: select('core').getEntityRecords('taxonomy', 'cs_categories', parent_query )
            }
            } )( ( { taxonomies, className, setAttributes, clientId, attributes: { tax, title, url, urlTxt } } ) => {



            const taxList = ( taxonomies ) =>{

                if( taxonomies ){

                    let selectItem = [ { label: 'All Case Studies', value: 0 } ];

                    taxonomies.map((term, index) => {

                        if( term.count > 0 ){
                            selectItem.push( { label: term.name, value: term.id } )
                        }
                        
                    })

                    return selectItem;

                }
            }

            return [
                <InspectorControls>                    

                    { ! taxonomies ? (
                            
                            <Spinner />

                    ):(

                     <PanelBody>

                        <PanelRow>

                            <SelectControl
                                label="Case Studies Category"
                                value={ tax }
                                onChange={ ( tax ) => { setAttributes( { tax } ) } }
                                options={ taxList( taxonomies ) }
                            />
                        </PanelRow>
                        <PanelRow>

                            <SelectControl
                                label="Case Studies Link"
                                value={ url }
                                onChange={ ( url ) => { setAttributes( { url } ) } }
                                options={ taxList( taxonomies ) }
                            />
                        </PanelRow>

                    </PanelBody>
                    
                    )}
                    
                </InspectorControls>,
                <div className={ className }>

                    <RichText
                        tagName="h2"
                        value={ title }
                        onChange={ ( title ) => setAttributes( { title } ) }
                    />

                    <Disabled>

                        <ServerSideRender
                            block="nhs-cs/casestudies"
                            attributes={ {
                                'tax': tax,
                                'title': title,
                                'backend': true,
                                'url': url,
                                'urlTxt' : urlTxt
                            } }
                        />

                    </Disabled>

                    
                    <div className="nhsuk-action-link text-center">


                        <a className="nhsuk-action-link__link">
                            <svg className="nhsuk-icon nhsuk-icon__arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 2a10 10 0 0 0-9.95 9h11.64L9.74 7.05a1 1 0 0 1 1.41-1.41l5.66 5.65a1 1 0 0 1 0 1.42l-5.66 5.65a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41L13.69 13H2.05A10 10 0 1 0 12 2z"></path>
                            </svg>
                            <RichText
                                tagName="span"
                                className="nhsuk-action-link__text"
                                value={ urlTxt }
                                onChange={ ( urlTxt ) => setAttributes( { urlTxt } ) }
                            />
                        </a>
                    </div>


                </div>
            ];
        }),
        save: props => {
            const { attributes } = props;
            return null;
        },
    },
);