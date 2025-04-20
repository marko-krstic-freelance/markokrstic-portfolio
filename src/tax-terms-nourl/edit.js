import { __experimentalInputControl as InputControl } from "@wordpress/components";
import { useState, useEffect } from "react";
import {
  useBlockProps,
  InspectorControls,
  useBlockEditContext,
} from "@wordpress/block-editor";
import { PanelBody, Spinner } from "@wordpress/components";
import { useSelect } from "@wordpress/data";
import { store as coreStore } from "@wordpress/core-data";
import apiFetch from "@wordpress/api-fetch";
import { addQueryArgs } from "@wordpress/url";
import "./editor.scss";

export default function Edit({ attributes, setAttributes, context }) {
  const { taxonomy = "project_role" } = attributes;
  const { postId } = context;
  const [terms, setTerms] = useState([]);
  const [isLoading, setIsLoading] = useState(false);

  const updateTaxonomy = (newValue) => {
    setAttributes({ taxonomy: newValue });
  };

  // Fetch terms when taxonomy changes or post ID changes
  useEffect(() => {
    if (!taxonomy || !postId) return;

    setIsLoading(true);

    apiFetch({
      path: addQueryArgs(`/wp/v2/${taxonomy}`, {
        post: postId,
        per_page: -1,
      }),
    })
      .then((fetchedTerms) => {
        setTerms(Array.isArray(fetchedTerms) ? fetchedTerms : []);
        setIsLoading(false);
      })
      .catch((error) => {
        console.error("Error fetching terms:", error);
        setTerms([]);
        setIsLoading(false);
      });
  }, [taxonomy, postId]);

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
