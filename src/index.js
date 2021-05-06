/**
 * External dependencies
 */
import { registerPlugin } from '@wordpress/plugins';
import Select, { components } from 'react-select';
import { SortableContainer, SortableElement } from 'react-sortable-hoc';

import { arrayMove } from './utils';

import './style.scss';

const SortableMultiValue = SortableElement(props => {
	const onMouseDown = e => {
		e.preventDefault();
		e.stopPropagation();
	};

	const innerProps = { onMouseDown };

	return <components.MultiValue {...props} innerProps={innerProps} />;
});

const SortableSelect = SortableContainer(Select);

function customizeTaxonomySelector( OriginalComponent ) {
	return function( props ) {
		if (taxonomiesMultiSelectData && taxonomiesMultiSelectData[props.slug]) {
			if (!window.HierarchicalTermSelector) {
				window.HierarchicalTermSelector = class HierarchicalTermSelector extends OriginalComponent {
					changeHandler( values ) {
						values = Array.isArray(values) ? values.map(value => value.value) : [values.value];

						const { onUpdateTerms, taxonomy } = this.props;

						onUpdateTerms( values, taxonomy.rest_base );
					}

					sortEndHandler({ oldIndex, newIndex }) {
						const { terms = [], onUpdateTerms, taxonomy } = this.props;
						const values = arrayMove(terms, oldIndex, newIndex);

						onUpdateTerms( values, taxonomy.rest_base );
					}

					// Copied from HierarchicalTermSelector, changed input type to multi select component
					renderTerms( renderedTerms ) {
						const { terms = [] } = this.props;

						const { selectOptions, defaultValue } = renderedTerms.reduce((acc, term) => {
							const option = {
								label: term.name,
								value: term.id
							};

							acc.selectOptions.push(option);

							const termIndex = terms.indexOf(term.id);
							if (termIndex !== -1) {
								acc.defaultValue[termIndex] = option;
							}

							return acc;
						}, { selectOptions: [], defaultValue: [] });

						return (
							<>
								<SortableSelect
									axis='xy'
									distance={4}
									isMulti={taxonomiesMultiSelectData[props.slug].is_multiple}
									placeholder={this.props.taxonomy.name}
									value={defaultValue}
									options={selectOptions}
									components={{ MultiValue: SortableMultiValue }}
									onChange={this.changeHandler.bind(this)}
									onSortEnd={this.sortEndHandler.bind(this)}
								/>
								<div className='add_or_edit'>
									<a href={`/wp-admin/edit-tags.php?taxonomy=${props.slug}`}>
										{props.taxonomy.labels.add_or_edit_item}
									</a>
								</div>
							</>
						);
					}
				};
			}

			return <window.HierarchicalTermSelector { ...props } />;
		}

		return <OriginalComponent { ...props } />;
	};
}

registerPlugin( 'guten-taxonomies-multiselect-ui', {
	render: customizeTaxonomySelector,
});
wp.hooks.addFilter( 'editor.PostTaxonomyType', 'my-custom-plugin', customizeTaxonomySelector );
