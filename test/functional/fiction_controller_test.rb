require 'test_helper'

class FictionControllerTest < ActionController::TestCase
  setup do
    @fiction = fiction(:one)
  end

  test "should get index" do
    get :index
    assert_response :success
    assert_not_nil assigns(:fiction)
  end

  test "should get new" do
    get :new
    assert_response :success
  end

  test "should create fiction" do
    assert_difference('Fiction.count') do
      post :create, fiction: { description: @fiction.description, externalLink: @fiction.externalLink, imagePath: @fiction.imagePath, name: @fiction.name }
    end

    assert_redirected_to fiction_path(assigns(:fiction))
  end

  test "should show fiction" do
    get :show, id: @fiction
    assert_response :success
  end

  test "should get edit" do
    get :edit, id: @fiction
    assert_response :success
  end

  test "should update fiction" do
    put :update, id: @fiction, fiction: { description: @fiction.description, externalLink: @fiction.externalLink, imagePath: @fiction.imagePath, name: @fiction.name }
    assert_redirected_to fiction_path(assigns(:fiction))
  end

  test "should destroy fiction" do
    assert_difference('Fiction.count', -1) do
      delete :destroy, id: @fiction
    end

    assert_redirected_to fiction_index_path
  end
end
