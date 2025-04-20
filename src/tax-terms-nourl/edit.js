import { __experimentalInputControl as InputControl } from "@wordpress/components";
import { useState, useEffect } from "react";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, Spinner } from "@wordpress/components";
import apiFetch from "@wordpress/api-fetch";
import { addQueryArgs } from "@wordpress/url";
import "./editor.scss";

export default function Edit({ attributes, setAttributes, context }) {
  const { taxonomy = "project_role", separator = ", " } = attributes;
  const { postId } = context;
  const [terms, setTerms] = useState([]);
  const [isLoading, setIsLoading] = useState(false);

  const updateTaxonomy = (newValue) => {
    setAttributes({ taxonomy: newValue });
  };

  const updateSeparator = (newValue) => {
    setAttributes({ separator: newValue });
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

  // Function to render terms in the editor
  const renderTerms = () => {
    if (terms.length === 0) {
      return <p>No terms found for taxonomy: {taxonomy}</p>;
    }

    // Single term - no separator
    if (terms.length === 1) {
      return <div>{terms[0].name}</div>;
    }

    // Multiple terms - with separator
    return <div>{terms.map((term) => term.name).join(separator)}</div>;
  };

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
          <InputControl
            label="Separator"
            value={separator}
            onChange={updateSeparator}
            help="Character(s) to separate multiple terms (when more than one is present)"
          />
        </PanelBody>
      </InspectorControls>
      <div {...useBlockProps()}>{isLoading ? <Spinner /> : renderTerms()}</div>
    </>
  );
}
