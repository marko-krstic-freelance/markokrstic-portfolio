import { __experimentalInputControl as InputControl } from "@wordpress/components";
import { useState, useEffect } from "react";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, Spinner } from "@wordpress/components";
import { useSelect } from "@wordpress/data";
import { store as coreStore } from "@wordpress/core-data";
import { store as editorStore } from "@wordpress/editor";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
  const { taxonomy = "project_role" } = attributes;

  const updateTaxonomy = (newValue) => {
    setAttributes({ taxonomy: newValue });
  };

  const postId = useSelect(
    (select) => select(editorStore).getCurrentPostId(),
    []
  );

  const { terms, isLoading } = useSelect(
    (select) => {
      const { getEntityRecords } = select(coreStore);

      // Don't try to fetch with an empty taxonomy
      if (!taxonomy) return { terms: [], isLoading: false };

      const query = { post: postId };
      const taxonomyTerms = getEntityRecords("taxonomy", taxonomy, query);

      return {
        terms: taxonomyTerms,
        isLoading: taxonomyTerms === null,
      };
    },
    [taxonomy, postId]
  );

  return (
    <>
      <InspectorControls>
        <PanelBody title="Taxonomy Settings" initialOpen={true}>
          <InputControl
            label="Taxonomy"
            value={taxonomy}
            onChange={updateTaxonomy}
            help="Enter taxonomy slug (e.g. project_role, category, post_tag)"
          />
        </PanelBody>
      </InspectorControls>
      <div {...useBlockProps()}>
        {isLoading ? (
          <Spinner />
        ) : !terms || terms.length === 0 ? (
          <p>No terms found for taxonomy: {taxonomy}</p>
        ) : (
          <div>
            {terms.map((term) => (
              <div key={term.id}>{term.name}</div>
            ))}
          </div>
        )}
      </div>
    </>
  );
}
