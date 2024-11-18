import { registerBlockType } from '@wordpress/blocks';
import { useSelect } from '@wordpress/data';
import { SelectControl } from '@wordpress/components';

registerBlockType('investimentos/bloco', {
    title: 'Bloco Investimentos',
    icon: 'chart-line',
    category: 'widgets',
    attributes: {
        postId: {
            type: 'number',
            default: 0,
        },
    },
    edit: ({ attributes, setAttributes }) => {
        const { postId } = attributes;

        // Obter todos os posts do CPT
        const posts = useSelect((select) =>
            select('core').getEntityRecords('postType', 'investimentos', {
                per_page: -1,
                _fields: 'id,title',
            })
        );

        if (!posts) {
            return 'Carregando...';
        }

        if (posts.length === 0) {
            return 'Nenhum investimento encontrado.';
        }

        return (
            <SelectControl
                label="Selecione um Investimento"
                value={postId}
                options={[
                    { label: 'Selecione...', value: 0 },
                    ...posts.map((post) => ({
                        label: post.title.rendered,
                        value: post.id,
                    })),
                ]}
                onChange={(newPostId) => setAttributes({ postId: parseInt(newPostId, 10) })}
            />
        );
    },
    save: () => {
        return null;
    },
});
