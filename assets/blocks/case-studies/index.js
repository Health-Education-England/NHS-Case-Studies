/**
 * Block dependencies
 */
// import icon from './icon';
// import './style.scss';

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText } = wp.editor;

/**
 * Register block
 */
export default registerBlockType(
    'nhs_cs/casestudies',
    {
        title: __( 'Example - RichText', 'nhs_cs' ),
        description: __( 'How to use the RichText component for building your own editable blocks.', 'nhs_cs' ),
        category: 'common',
        icon: {
            background: 'rgba(254, 243, 224, 0.52)',
            src: 'welcome-learn-more',
        },   
        keywords: [
            __( 'Banner', 'nhs_cs' ),
            __( 'Call to Action', 'nhs_cs' ),
            __( 'Message', 'nhs_cs' ),
        ],
        attributes: {
            message: {
                type: 'array',
                source: 'children',
                selector: '.message-body',
            }
        },
        edit: props => {
            const { attributes: { message }, className, setAttributes } = props;
            const onChangeMessage = message => { setAttributes( { message } ) };
            return (
                <div className={ className }>
                    <h2>{ __( 'Call to Action', 'nhs_cs' ) }</h2>
                    <RichText
                        tagName="div"
                        multiline="p"
                        placeholder={ __( 'Add your custom message', 'nhs_cs' ) }
                  		onChange={ onChangeMessage }
                  		value={ message }
              		/>
                </div>
            );
        },
        save: props => {
            const { attributes: { message } } = props;
            return (
                <div>
                    <h2>{ __( 'Call to Action', 'nhs_cs' ) }</h2>
                    <div class="message-body">
                        { message }
                    </div>
                </div>
            );
        },
    },
);